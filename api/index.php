<?php

// Define env() fallback helper in case it is called before Laravel helpers load
if (!function_exists('env')) {
    function env($key, $default = null) {
        $val = $_ENV[$key] ?? getenv($key);
        if ($val === false || $val === null) {
            return $default;
        }
        switch (strtolower($val)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }
        return $val;
    }
}

// Prepare writeable storage & cache directories in /tmp for Vercel Serverless
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Copy pre-seeded SQLite database to /tmp if using SQLite driver
$dbConn = env('DB_CONNECTION', 'sqlite');
if ($dbConn === 'sqlite') {
    $dbPath = __DIR__ . '/../database/database.sqlite';
    $tmpDbPath = '/tmp/database.sqlite';

    if (file_exists($dbPath) && !file_exists($tmpDbPath)) {
        @copy($dbPath, $tmpDbPath);
    }
}

// Forward Vercel requests to public/index.php
require __DIR__ . '/../public/index.php';
