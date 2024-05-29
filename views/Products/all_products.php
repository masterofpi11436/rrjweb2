<a href="/">Home</a>

<p>Total Products: <?= $total ?></p>

<?php foreach ($products as $product): ?>
    <h2><a href="/products/viewone/<?= $product["id"] ?>"><?= $product["name"]; ?></a></h2>
<?php endforeach; ?>