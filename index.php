<?php
$site = require __DIR__ . '/data/site.php';
$ladder = require __DIR__ . '/data/ladder.php';

$progressFile = __DIR__ . '/data/progress.json';
$progress = [];

if (file_exists($progressFile)) {
    $json = file_get_contents($progressFile);
    $progress = json_decode($json, true) ?: [];
}

$ladder['progress'] = $progress; // 🔥 THIS LINE IS CRITICAL

require __DIR__ . '/partials/header.php';
require __DIR__ . '/partials/hero.php';
require __DIR__ . '/partials/explanation.php';
require __DIR__ . '/partials/ladder.php';
require __DIR__ . '/partials/footer.php';