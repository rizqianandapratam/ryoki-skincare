<?php
$db = new SQLite3(__DIR__ . '/../database/database.sqlite');
$slug = 'ryoki-hand-body';
$newPrice = 76000;
$before = $db->querySingle("SELECT id, slug, name, price FROM products WHERE slug = '$slug'", true);
if ($before) {
    echo "Before: " . $before['id'] . '|' . $before['slug'] . '|' . $before['name'] . '|' . $before['price'] . PHP_EOL;
    $stmt = $db->prepare('UPDATE products SET price = :price WHERE slug = :slug');
    $stmt->bindValue(':price', $newPrice, SQLITE3_INTEGER);
    $stmt->bindValue(':slug', $slug, SQLITE3_TEXT);
    $stmt->execute();
    $after = $db->querySingle("SELECT id, slug, name, price FROM products WHERE slug = '$slug'", true);
    echo "After: " . $after['id'] . '|' . $after['slug'] . '|' . $after['name'] . '|' . $after['price'] . PHP_EOL;
} else {
    echo "Product '$slug' not found." . PHP_EOL;
}
