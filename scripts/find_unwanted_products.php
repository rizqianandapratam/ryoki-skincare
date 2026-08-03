<?php
$db = new SQLite3(__DIR__ . '/../database/database.sqlite');
$slugs = [
    'ryoki-barrier-restore-ceramide-moisturizer',
    'ryoki-aqua-shield-sunscreen',
    'ryoki-hydrating-essence-toner',
    'ryoki-acne-spot-treatment-gel',
];
foreach ($slugs as $slug) {
    $row = $db->querySingle("SELECT id, slug, name, price FROM products WHERE slug = '$slug'", true);
    if ($row) {
        echo "FOUND: " . $row['id'] . '|' . $row['slug'] . '|' . $row['name'] . '|' . $row['price'] . PHP_EOL;
    } else {
        echo "NOT FOUND: $slug" . PHP_EOL;
    }
}
