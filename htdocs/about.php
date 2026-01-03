<?php
/**
 * Blog Template - About Page
 */

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'About';
$content = loadPage('About');

include __DIR__ . '/includes/header.php';
?>

<article class="entry">
    <?= $content ?>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
