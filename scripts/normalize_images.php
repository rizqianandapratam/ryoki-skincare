<?php
// Run from project root: php scripts/normalize_images.php
$map = [
    'public/images/Face Toner.png' => 'public/images/face-toner.png',
    'public/images/Hand Body.png' => 'public/images/hand-body.png',
    'public/images/Miss Comby Comby.png' => 'public/images/miss-comby-comby.png',
    'public/images/Night Cream.png' => 'public/images/night-cream.png',
    'public/images/peeling spray.png' => 'public/images/peeling-spray.png',
];

foreach ($map as $from => $to) {
    if (file_exists($from)) {
        if (!file_exists($to)) {
            if (rename($from, $to)) {
                echo "Renamed: $from -> $to\n";
            } else {
                echo "Failed to rename: $from\n";
            }
        } else {
            // target exists; skip or remove source
            echo "Target already exists, removing source: $from\n";
            @unlink($from);
        }
    } else {
        echo "Not found: $from\n";
    }
}

echo "Done. You should run scripts/sync_images_to_db.php and clear caches.\n";
