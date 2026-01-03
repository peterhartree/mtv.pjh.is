<?php
/**
 * Blog Template - Homepage
 * Displays paginated list of posts
 */

require_once __DIR__ . '/includes/functions.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$data = getPaginatedPosts($page);

include __DIR__ . '/includes/header.php';
?>

<?php foreach ($data['posts'] as $post): ?>
<article class="entry">
    <div class="post-content">
        <?php
        // Replace h1 with linked h1 on homepage
        $linkedHtml = preg_replace(
            '/<h1>([^<]+)<\/h1>/',
            '<h1><a href="/' . e($post['slug']) . '">$1</a></h1>',
            $post['html']
        );
        echo $linkedHtml;
        ?>
    </div>
    <?= renderPostMeta($post) ?>
</article>
<?php endforeach; ?>

<?php if ($data['totalPages'] > 1): ?>
<div class="pagination">
    <?php if ($data['hasPrev']): ?>
        <a href="/?page=<?= $data['currentPage'] - 1 ?>">Previous</a>
    <?php endif; ?>

    <span>Page <?= $data['currentPage'] ?> of <?= $data['totalPages'] ?></span>

    <?php if ($data['hasNext']): ?>
        <a href="/?page=<?= $data['currentPage'] + 1 ?>">Next</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
