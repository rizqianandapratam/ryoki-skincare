<?php
$db = new SQLite3(__DIR__ . '/../database/database.sqlite');
$product = $db->querySingle("SELECT id, slug, name, price FROM products WHERE slug = 'ryoki-hand-body'", true);
if ($product) {
    echo $product['id'] . '|' . $product['slug'] . '|' . $product['name'] . '|' . $product['price'] . PHP_EOL;
} else {
    echo "not-found" . PHP_EOL;
}

