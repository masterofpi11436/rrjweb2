<a href="/tablets/add">Add New Inmate</a>

<form method="get" action="/tablets/all">
    <input type="text" name="search" placeholder="Search tablets..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($tablets)): ?>
    <ul>
        <?php foreach ($tablets as $tablet): ?>
            <li>
                <a href="/tablets/one/<?= htmlspecialchars($tablet['id']) ?>">
                    <?= htmlspecialchars($tablet['inmate_number']) ?> - <?= htmlspecialchars($tablet['first_name']) ?> <?= htmlspecialchars($tablet['last_name']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No tablets found.</p>
<?php endif; ?>


<!-- <?php foreach ($tablets as $tablet): ?>
    <h2><a href="/tablets/one/<?= htmlspecialchars($tablet['id']) ?>"><?= $tablet["last_name"]; ?>, <?= $tablet["first_name"]; ?></a></h2>
<?php endforeach; ?> -->