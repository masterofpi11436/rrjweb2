<a href="/programs/contractors/one/<?= $contractor["id"] ?>">Cancel</a>

<form method="post" action="/programs/contractors/destroy/<?= htmlspecialchars($contractor['id']) ?>">

    <h2>Are you sure you want to delete <?= htmlspecialchars($contractor['last_name']) ?>,  <?= htmlspecialchars($contractor['first_name']) ?> from the database?</h2>
    <button type="submit">Delete Contractor</button>

</form>
