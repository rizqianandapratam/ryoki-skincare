<?php
$db = new SQLite3(__DIR__ . '/../database/database.sqlite');
$slugs = [
    'miss-comby-comby',
    'ryoki-deodorant-spray',
    'ryoki-face-toner',
    'ryoki-brightening-peeling-spray',
];
$placeholders = implode(',', array_fill(0, count($slugs), '?'));
$stmt = $db->prepare("SELECT id, slug, name, image FROM products WHERE slug IN ($placeholders) ORDER BY id");
foreach ($slugs as $i => $slug) {
    $stmt->bindValue($i + 1, $slug, SQLITE3_TEXT);
}
$result = $stmt->execute();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo $row['id'] . '|' . $row['slug'] . '|' . $row['name'] . '|' . $row['image'] . "\n";
}
