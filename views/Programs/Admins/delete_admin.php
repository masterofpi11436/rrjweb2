<a href="/programs/admins/one/<?= $contractor["id"] ?>">Cancel</a>

<form method="post" action="/programs/admins/destroy/<?= htmlspecialchars($contractor['id']) ?>">

    <h2>Are you sure you want to delete the <?= htmlspecialchars($contractor['last_name']) ?>,  <?= htmlspecialchars($contractor['first_name']) ?>?</h2>
    <button type="submit">Delete Contractor</button>

</form>
