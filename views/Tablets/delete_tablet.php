<a href="/tablets/one/<?= $tablet["id"] ?>">Cancel</a>

<form method="post" action="/tablets/destroy/<?= htmlspecialchars($tablet['id']) ?>">

    <h2>Are you sure you want to delete inmate <?= htmlspecialchars($tablet['last_name']) ?>, <?= htmlspecialchars($tablet['first_name']) ?>?</h2>
    <button type="submit">Delete Tablet</button>

</form>
