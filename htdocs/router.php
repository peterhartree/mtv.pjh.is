<?php
/**
 * Router for PHP built-in server
 * Simulates .htaccess rewrites for local development
 *
 * Usage: php -S localhost:8888 router.php
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rawurldecode($uri);

// Serve static files directly
$staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2'];
$extension = pathinfo($uri, PATHINFO_EXTENSION);

if (in_array($extension, $staticExtensions) && file_exists(__DIR__ . $uri)) {
    return false; // Let PHP serve the static file
}

// Route handling (mirrors .htaccess rules)
$routes = [
    // Homepage
    '#^/$#' => 'index.php',
    '#^/\?#' => 'index.php', // Homepage with query string (pagination)

    // Archives page
    '#^/archives/?$#' => 'archives.php',

    // About page
    '#^/about/?$#' => 'about.php',

    // Tag pages
    '#^/tagged/(.+?)/?$#' => function($matches) {
        $_GET['tag'] = $matches[1];
        return 'tagged.php';
    },

    // Single post pages (catch-all for slugs)
    '#^/([a-zA-Z0-9-]+)/?$#' => function($matches) {
        $_GET['slug'] = $matches[1];
        return 'post.php';
    },
];

foreach ($routes as $pattern => $target) {
    if (preg_match($pattern, $uri, $matches)) {
        if (is_callable($target)) {
            $file = $target($matches);
        } else {
            $file = $target;
        }

        $filepath = __DIR__ . '/' . $file;
        if (file_exists($filepath)) {
            include $filepath;
            return true;
        }
    }
}

// 404 fallback
$_GET['slug'] = 'not-found';
include __DIR__ . '/post.php';
return true;
