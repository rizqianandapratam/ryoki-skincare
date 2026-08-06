<?php

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
if (env('DB_CONNECTION', 'sqlite') === 'sqlite') {
    $dbPath = __DIR__ . '/../database/database.sqlite';
    $tmpDbPath = '/tmp/database.sqlite';

    if (file_exists($dbPath) && !file_exists($tmpDbPath)) {
        @copy($dbPath, $tmpDbPath);
    }
}

// Forward Vercel requests to public/index.php
require __DIR__ . '/../public/index.php';
