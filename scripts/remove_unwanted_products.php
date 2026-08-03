<?php
$db = new SQLite3(__DIR__ . '/../database/database.sqlite');
$slugs = [
    'ryoki-barrier-restore-ceramide-moisturizer',
    'ryoki-aqua-shield-sunscreen',
    'ryoki-hydrating-essence-toner',
    'ryoki-acne-spot-treatment-gel',
];
foreach ($slugs as $slug) {
    $stmt = $db->prepare('DELETE FROM products WHERE slug = :slug');
    $stmt->bindValue(':slug', $slug, SQLITE3_TEXT);
    $stmt->execute();
    echo "deleted: $slug\n";
}
