<?php require __DIR__ . '/../includes/header.php' ?>

<section>
    <h1><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?></h1>
    <h2><?= htmlspecialchars($article->author, ENT_QUOTES, 'UTF-8') ?></h2>
    <p><?= htmlspecialchars($article->formatPublishDate(), ENT_QUOTES, 'UTF-8') ?></p>
    <p><?= htmlspecialchars($article->description, ENT_QUOTES, 'UTF-8') ?></p>

    <nav class="navigation">
        <?php if ($previousId) : ?>
            <a href="/articles/<?= htmlspecialchars($previousId, ENT_QUOTES, 'UTF-8') ?>" class="button">Previous article</a>
        <?php else : ?>
            <span class="button disabled">Previous article</span>
        <?php endif; ?>

        <?php if ($nextId) : ?>
            <a href="/articles/<?= htmlspecialchars($nextId, ENT_QUOTES, 'UTF-8') ?>" class="button">Next article</a>
        <?php else : ?>
            <span class="button disabled">Next article</span>
        <?php endif; ?>
        </nav>
</section>

<?php require __DIR__ . '/../includes/footer.php' ?>