<?php
$allowed_langs = ['en', 'ja', 'ko', 'vi'];

if (isset($_GET['lang']) && in_array($_GET['lang'], $allowed_langs)) {
    // Vercel serverless functions don't persist sessions well, use cookies instead
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/");
    $current_lang = $_GET['lang'];
} else {
    $current_lang = $_COOKIE['lang'] ?? 'en';
}

if (!in_array($current_lang, $allowed_langs)) {
    $current_lang = 'en';
}

$lang = require_once __DIR__ . "/lang/{$current_lang}.php";

// Main Entry Point
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/hero.php';
require_once __DIR__ . '/components/about.php';
require_once __DIR__ . '/components/experience.php';
require_once __DIR__ . '/components/projects.php';
require_once __DIR__ . '/components/footer.php';
?>
