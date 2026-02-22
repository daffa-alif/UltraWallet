<?php
// config/database.php
// Works in TWO modes automatically:
//   MODE 1: MongoDB PECL extension (extension=mongodb in php.ini)
//   MODE 2: JSON flat-file fallback (works right now, zero setup)

require_once __DIR__ . '/env.php';

// ─────────────────────────────────────────────
// Determine which driver to use
// ─────────────────────────────────────────────
define('DB_USE_MONGO', extension_loaded('mongodb'));
define('DB_DATA_DIR',  __DIR__ . '/../data/');

if (!DB_USE_MONGO && !is_dir(DB_DATA_DIR)) {
    mkdir(DB_DATA_DIR, 0755, true);
}

class Database {

    // ── MONGO (real) ───────────────────────────
    private static ?MongoDB\Driver\Manager $manager = null;
    private static string $dbName = 'ultrawallet';

    private static function mongo(): MongoDB\Driver\Manager {
        if (self::$manager === null) {
            $uri          = $_ENV['MONGO_URI'] ?? 'mongodb://localhost:27017';
            self::$dbName = $_ENV['MONGO_DB']  ?? 'ultrawallet';
            self::$manager = new MongoDB\Driver\Manager($uri);
        }
        return self::$manager;
    }

    // ── FILE (fallback) ────────────────────────
    private static function filePath(string $col): string {
        return DB_DATA_DIR . $col . '.json';
    }

    private static function fileRead(string $col): array {
        $f = self::filePath($col);
        if (!file_exists($f)) return [];
        $data = json_decode(file_get_contents($f), true);
        return is_array($data) ? $data : [];
    }

    private static function fileWrite(string $col, array $data): void {
        file_put_contents(self::filePath($col), json_encode($data, JSON_PRETTY_PRINT));
    }

    private static function matchesFilter(array $doc, array $filter): bool {
        foreach ($filter as $key => $val) {
            if ($key === '$or') {
                $any = false;
                foreach ($val as $sub) {
                    if (self::matchesFilter($doc, $sub)) { $any = true; break; }
                }
                if (!$any) return false;
            } elseif (!isset($doc[$key]) || $doc[$key] !== $val) {
                return false;
            }
        }
        return true;
    }

    // ── PUBLIC API ─────────────────────────────

    public static function findOne(string $col, array $filter): ?array {
        if (DB_USE_MONGO) {
            try {
                $q = new MongoDB\Driver\Query($filter, ['limit' => 1]);
                $c = self::mongo()->executeQuery(self::$dbName . '.' . $col, $q);
                $c->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
                $r = $c->toArray();
                return $r[0] ?? null;
            } catch (Exception $e) { return null; }
        }
        // FILE fallback
        foreach (self::fileRead($col) as $doc) {
            if (self::matchesFilter($doc, $filter)) return $doc;
        }
        return null;
    }

    public static function insertOne(string $col, array $doc): string {
        $id = bin2hex(random_bytes(12));
        $doc['_id'] = $id;
        if (DB_USE_MONGO) {
            try {
                $bulk = new MongoDB\Driver\BulkWrite();
                $bulk->insert($doc);
                self::mongo()->executeBulkWrite(self::$dbName . '.' . $col, $bulk);
                return $id;
            } catch (Exception $e) {
                throw new RuntimeException("Insert failed: " . $e->getMessage());
            }
        }
        // FILE fallback
        $all = self::fileRead($col);
        $all[] = $doc;
        self::fileWrite($col, $all);
        return $id;
    }

    public static function findMany(string $col, array $filter = [], int $limit = 100): array {
        if (DB_USE_MONGO) {
            try {
                $opts = $limit > 0 ? ['limit' => $limit] : [];
                $q = new MongoDB\Driver\Query($filter, $opts);
                $c = self::mongo()->executeQuery(self::$dbName . '.' . $col, $q);
                $c->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
                return $c->toArray();
            } catch (Exception $e) { return []; }
        }
        // FILE fallback
        $results = [];
        foreach (self::fileRead($col) as $doc) {
            if (empty($filter) || self::matchesFilter($doc, $filter)) {
                $results[] = $doc;
                if ($limit > 0 && count($results) >= $limit) break;
            }
        }
        return $results;
    }

    public static function updateOne(string $col, array $filter, array $update): bool {
        if (DB_USE_MONGO) {
            try {
                $bulk = new MongoDB\Driver\BulkWrite();
                $bulk->update($filter, $update, ['multi' => false]);
                self::mongo()->executeBulkWrite(self::$dbName . '.' . $col, $bulk);
                return true;
            } catch (Exception $e) { return false; }
        }
        // FILE fallback
        $all = self::fileRead($col);
        $set = $update['$set'] ?? $update;
        foreach ($all as &$doc) {
            if (self::matchesFilter($doc, $filter)) {
                foreach ($set as $k => $v) $doc[$k] = $v;
                break;
            }
        }
        self::fileWrite($col, $all);
        return true;
    }

    public static function isUsingFallback(): bool {
        return !DB_USE_MONGO;
    }
}
