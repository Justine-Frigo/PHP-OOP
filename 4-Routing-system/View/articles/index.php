<?php require __DIR__ . '/../includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><a href="/articles/<?=$article->id ?>"><?= $article->title ?>  - <?= $article->author ?></a></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require __DIR__ . '/../includes/footer.php'?>