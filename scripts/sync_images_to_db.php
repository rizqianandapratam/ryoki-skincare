<?php
// Run from project root: php scripts/sync_images_to_db.php

$dbPath = __DIR__ . '/../database/database.sqlite';
if (!file_exists($dbPath)) {
    echo "database.sqlite not found at $dbPath\n";
    exit(1);
}

$db = new SQLite3($dbPath);
$map = [
    'ryoki-alpha-arbutin-whitening-night-cream' => 'images/night-cream.png',
    'ryoki-night-cream' => 'images/night-cream.png',
    'ryoki-face-toner' => 'images/face-toner.png',
    'miss-comby-comby' => 'images/miss-comby-comby.png',
    'ryoki-brightening-peeling-spray' => 'images/peeling-spray.png',
    'ryoki-deodorant-spray' => 'images/deodorant-spray.png',
    'ryoki-hand-body' => 'images/hand-body.png',
];

foreach ($map as $slug => $image) {
    $stmt = $db->prepare('UPDATE products SET image = :image WHERE slug = :slug');
    $stmt->bindValue(':image', $image, SQLITE3_TEXT);
    $stmt->bindValue(':slug', $slug, SQLITE3_TEXT);
    $res = $stmt->execute();
    echo "Updated $slug -> $image\n";
}

echo "Done. You should run artisan cache/view clear commands and hard-refresh the browser.\n";
