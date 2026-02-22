<?php
// config/database.php
// Zero-dependency: uses PHP MongoDB PECL extension only (no Composer needed)

require_once __DIR__ . '/env.php';

// Check if MongoDB PECL extension is loaded
if (!extension_loaded('mongodb')) {
    die('<!DOCTYPE html><html lang="en">
<head><meta charset="UTF-8"><title>MongoDB Extension Missing</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Space+Mono&display=swap" rel="stylesheet">
</head>
<body style="background:#050810;color:#f9fafb;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem;">
<div style="max-width:580px;background:#0d1117;border:1px solid #f59e0b40;border-radius:16px;padding:2.5rem;">
    <div style="font-size:2.5rem;margin-bottom:1rem;">&#9888;&#65039;</div>
    <h1 style="font-family:Syne,sans-serif;font-size:1.5rem;color:#f59e0b;margin-bottom:.75rem;">MongoDB PHP Extension Required</h1>
    <p style="color:#9ca3af;font-size:.9rem;margin-bottom:1.5rem;">
        The <code style="color:#06b6d4;background:#06b6d420;padding:2px 6px;border-radius:4px;">mongodb</code> PHP extension is not loaded.
        Follow these steps to enable it for XAMPP on Windows:
    </p>
    <div style="background:#050810;border:1px solid #1f2937;border-radius:8px;padding:1.25rem;margin-bottom:1rem;">
        <p style="color:#6b7280;font-size:.7rem;font-family:Space Mono,monospace;margin-bottom:.5rem;">STEP 1 — Download the DLL for your PHP version</p>
        <a href="https://pecl.php.net/package/mongodb" style="color:#8b5cf6;font-size:.85rem;">pecl.php.net/package/mongodb</a>
        <p style="color:#9ca3af;font-size:.75rem;margin-top:.4rem;">Pick the .dll that matches your PHP version (check <code style="color:#06b6d4">C:\xampp\php\php.exe --version</code>)</p>
    </div>
    <div style="background:#050810;border:1px solid #1f2937;border-radius:8px;padding:1.25rem;margin-bottom:1rem;">
        <p style="color:#6b7280;font-size:.7rem;font-family:Space Mono,monospace;margin-bottom:.5rem;">STEP 2 — Copy .dll to XAMPP ext folder</p>
        <code style="color:#10b981;font-family:Space Mono,monospace;font-size:.8rem;">C:\xampp\php\ext\php_mongodb.dll</code>
    </div>
    <div style="background:#050810;border:1px solid #1f2937;border-radius:8px;padding:1.25rem;margin-bottom:1rem;">
        <p style="color:#6b7280;font-size:.7rem;font-family:Space Mono,monospace;margin-bottom:.5rem;">STEP 3 — Add to C:\xampp\php\php.ini</p>
        <code style="color:#8b5cf6;font-family:Space Mono,monospace;font-size:.85rem;">extension=mongodb</code>
    </div>
    <div style="background:#050810;border:1px solid #1f2937;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;">
        <p style="color:#6b7280;font-size:.7rem;font-family:Space Mono,monospace;margin-bottom:.5rem;">STEP 4 — Restart XAMPP Apache</p>
        <code style="color:#10b981;font-family:Space Mono,monospace;font-size:.85rem;">XAMPP Control Panel &rarr; Apache &rarr; Stop &rarr; Start</code>
    </div>
    <p style="color:#4b5563;font-size:.8rem;">After restart, refresh this page.</p>
</div>
</body></html>');
}

class Database {
    private static ?MongoDB\Driver\Manager $manager = null;
    private static string $dbName = 'ultrawallet';

    public static function connect(): MongoDB\Driver\Manager {
        if (self::$manager === null) {
            $uri          = $_ENV['MONGO_URI'] ?? 'mongodb://localhost:27017';
            self::$dbName = $_ENV['MONGO_DB']  ?? 'ultrawallet';

            try {
                self::$manager = new MongoDB\Driver\Manager($uri);
            } catch (Exception $e) {
                throw new RuntimeException("MongoDB connection failed: " . $e->getMessage());
            }
        }
        return self::$manager;
    }

    public static function getCollection(string $collection): array {
        return ['manager' => self::connect(), 'db' => self::$dbName, 'col' => $collection];
    }

    public static function findOne(string $collection, array $filter): ?array {
        $manager = self::connect();
        $query   = new MongoDB\Driver\Query($filter, ['limit' => 1]);
        try {
            $cursor = $manager->executeQuery(self::$dbName . '.' . $collection, $query);
            $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
            $results = $cursor->toArray();
            return $results[0] ?? null;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function insertOne(string $collection, array $document): bool {
        $manager = self::connect();
        $bulk    = new MongoDB\Driver\BulkWrite();
        $bulk->insert($document);
        try {
            $manager->executeBulkWrite(self::$dbName . '.' . $collection, $bulk);
            return true;
        } catch (Exception $e) {
            throw new RuntimeException("Insert failed: " . $e->getMessage());
        }
    }

    public static function findMany(string $collection, array $filter = [], array $opts = []): array {
        $manager = self::connect();
        $query   = new MongoDB\Driver\Query($filter, $opts);
        try {
            $cursor = $manager->executeQuery(self::$dbName . '.' . $collection, $query);
            $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
            return $cursor->toArray();
        } catch (Exception $e) {
            return [];
        }
    }
}
