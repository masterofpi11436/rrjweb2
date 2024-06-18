<a href="/programs/admins/one/<?= $admin["id"] ?>">Cancel</a>

<form method="post" action="/programs/admins/destroy/<?= htmlspecialchars($admin['id']) ?>">

    <h2>Are you sure you want to delete the <?= htmlspecialchars($admin['last_name']) ?>,  <?= htmlspecialchars($admin['first_name']) ?>?</h2>
    <button type="submit">Delete Contractor Admin</button>

</form>
