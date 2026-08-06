<?php

// Define env() fallback helper in case it is called before Laravel helpers load
if (!function_exists('env')) {
    function env($key, $default = null) {
        $val = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        if ($val === false || $val === null) {
            return $default;
        }
        switch (strtolower((string)$val)) {
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

// Override storage paths for Vercel read-only filesystem
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

$_ENV['APP_SERVICES_CACHE'] = '/tmp/storage/framework/cache/services.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/storage/framework/cache/services.php';
putenv('APP_SERVICES_CACHE=/tmp/storage/framework/cache/services.php');

$_ENV['APP_PACKAGES_CACHE'] = '/tmp/storage/framework/cache/packages.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/storage/framework/cache/packages.php';
putenv('APP_PACKAGES_CACHE=/tmp/storage/framework/cache/packages.php');

$_ENV['APP_CONFIG_CACHE'] = '/tmp/storage/framework/cache/config.php';
$_SERVER['APP_CONFIG_CACHE'] = '/tmp/storage/framework/cache/config.php';
putenv('APP_CONFIG_CACHE=/tmp/storage/framework/cache/config.php');

$_ENV['APP_ROUTES_CACHE'] = '/tmp/storage/framework/cache/routes.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/storage/framework/cache/routes.php';
putenv('APP_ROUTES_CACHE=/tmp/storage/framework/cache/routes.php');

$_ENV['APP_EVENTS_CACHE'] = '/tmp/storage/framework/cache/events.php';
$_SERVER['APP_EVENTS_CACHE'] = '/tmp/storage/framework/cache/events.php';
putenv('APP_EVENTS_CACHE=/tmp/storage/framework/cache/events.php');

// Handle database connection and fallback for Vercel Serverless
$dbConn = env('DB_CONNECTION', 'sqlite');
$dbPath = __DIR__ . '/../database/database.sqlite';
$tmpDbPath = '/tmp/database.sqlite';

if (file_exists($dbPath) && !file_exists($tmpDbPath)) {
    @copy($dbPath, $tmpDbPath);
}

$useSqlite = ($dbConn === 'sqlite');

if (!$useSqlite) {
    // Test PostgreSQL connectivity; if IPv6 fails, fallback to local /tmp SQLite
    try {
        $host = env('DB_HOST');
        $port = env('DB_PORT', 5432);
        $dbname = env('DB_DATABASE');
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        
        $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_TIMEOUT => 2]);
    } catch (\Throwable $e) {
        $useSqlite = true;
    }
}

if ($useSqlite) {
    $_ENV['DB_CONNECTION'] = 'sqlite';
    $_SERVER['DB_CONNECTION'] = 'sqlite';
    putenv('DB_CONNECTION=sqlite');

    $_ENV['DB_DATABASE'] = '/tmp/database.sqlite';
    $_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';
    putenv('DB_DATABASE=/tmp/database.sqlite');
}

// Forward Vercel requests to public/index.php
require __DIR__ . '/../public/index.php';
