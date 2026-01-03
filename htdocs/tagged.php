<?php
/**
 * Blog Template - Posts by Tag
 */

require_once __DIR__ . '/includes/functions.php';

$tagSlug = $_GET['tag'] ?? '';
$result = getPostsByTag($tagSlug);

if (empty($result['posts'])) {
    http_response_code(404);
    $pageTitle = 'Tag not found';
    include __DIR__ . '/includes/header.php';
    echo '<h1>Tag not found</h1>';
    echo '<p>No posts found with this tag.</p>';
    echo '<p><a href="/archives">Back to archives</a></p>';
    include __DIR__ . '/includes/footer.php';
    exit;
}

$posts = $result['posts'];
$tagName = $result['tagName'];
$pageTitle = $tagName;

include __DIR__ . '/includes/header.php';
?>

<h1><?= e($tagName) ?></h1>

<ul class="archives-list">
    <?php foreach ($posts as $post): ?>
    <li>
        <a href="/<?= e($post['slug']) ?>"><?= e($post['title']) ?></a>
        <span class="small"><?= e($post['dateFormatted']) ?></span>
    </li>
    <?php endforeach; ?>
</ul>

<p><a href="/archives">Back to archives</a></p>

<?php include __DIR__ . '/includes/footer.php'; ?>
