<?php require 'View/includes/header.php'?>

<section>
    <h1><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?></h1>
    <h2><?= htmlspecialchars($article->author, ENT_QUOTES, 'UTF-8') ?></h2>
    <p><?= htmlspecialchars($article->formatPublishDate(), ENT_QUOTES, 'UTF-8') ?></p>
    <p><?= htmlspecialchars($article->description, ENT_QUOTES, 'UTF-8') ?></p>

    <?php if ($previousId): ?>
        <a href="index.php?page=articles-show&id=<?= htmlspecialchars($previousId, ENT_QUOTES, 'UTF-8') ?>">Previous article</a>
    <?php else: ?>
        <span>Previous article</span>
    <?php endif; ?>

    <?php if ($nextId): ?>
        <a href="index.php?page=articles-show&id=<?= htmlspecialchars($nextId, ENT_QUOTES, 'UTF-8') ?>">Next article</a>
    <?php else: ?>
        <span>Next article</span>
    <?php endif; ?>
</section>

<?php require 'View/includes/footer.php'?>
