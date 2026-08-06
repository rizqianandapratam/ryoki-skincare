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

// Enable APP_DEBUG to trace Vercel exceptions
putenv('APP_DEBUG=true');
$_ENV['APP_DEBUG'] = 'true';

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
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

putenv('APP_SERVICES_CACHE=/tmp/storage/framework/cache/services.php');
$_ENV['APP_SERVICES_CACHE'] = '/tmp/storage/framework/cache/services.php';

putenv('APP_PACKAGES_CACHE=/tmp/storage/framework/cache/packages.php');
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/storage/framework/cache/packages.php';

putenv('APP_CONFIG_CACHE=/tmp/storage/framework/cache/config.php');
$_ENV['APP_CONFIG_CACHE'] = '/tmp/storage/framework/cache/config.php';

putenv('APP_ROUTES_CACHE=/tmp/storage/framework/cache/routes.php');
$_ENV['APP_ROUTES_CACHE'] = '/tmp/storage/framework/cache/routes.php';

putenv('APP_EVENTS_CACHE=/tmp/storage/framework/cache/events.php');
$_ENV['APP_EVENTS_CACHE'] = '/tmp/storage/framework/cache/events.php';

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
