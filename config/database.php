<?php
// config/database.php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

class Database {
    private static ?MongoDB\Client $client = null;
    private static ?MongoDB\Database $db = null;

    public static function loadEnv(): void {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }

    public static function connect(): MongoDB\Database {
        if (self::$db === null) {
            self::loadEnv();

            $uri    = $_ENV['MONGO_URI'];
            $dbName = $_ENV['MONGO_DB'];

            try {
                self::$client = new MongoDB\Client($uri, [], [
                    'typeMap' => [
                        'array'    => 'array',
                        'document' => 'array',
                        'root'     => 'array',
                    ],
                ]);
                self::$db = self::$client->selectDatabase($dbName);
            } catch (Exception $e) {
                error_log("MongoDB Connection Error: " . $e->getMessage());
                throw new RuntimeException("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$db;
    }

    public static function getCollection(string $name): MongoDB\Collection {
        return self::connect()->selectCollection($name);
    }

    public static function getClient(): MongoDB\Client {
        self::connect();
        return self::$client;
    }
}
