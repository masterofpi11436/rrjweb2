<a href="/tablets/add">Add New Inmate</a>

<?php foreach ($tablets as $tablet): ?>
    <h2><a href="/tablets/one/<?= htmlspecialchars($tablet['id']) ?>"><?= $tablet["last_name"]; ?>, <?= $tablet["first_name"]; ?></a></h2>
<?php endforeach; ?>