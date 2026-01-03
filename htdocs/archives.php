<?php
/**
 * Blog Template - Archives
 * Search and full post list
 */

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Archives';
$includeSearch = true;
$posts = loadAllPosts();

include __DIR__ . '/includes/header.php';
?>

<h1>Archives</h1>

<form class="search-form" onsubmit="return false;">
    <input type="text" id="search" placeholder="Search..." autocomplete="off">
</form>

<ul class="archives-list" id="archives-list">
    <?php foreach ($posts as $post): ?>
    <li data-title="<?= e(strtolower($post['title'])) ?>">
        <a href="/<?= e($post['slug']) ?>"><?= e($post['title']) ?></a>
        <span class="small"><?= e($post['dateFormatted']) ?></span>
    </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/includes/footer.php'; ?>
