<a href="/admins/one/<?= $user["id"] ?>">Cancel</a>

<form method="post" action="/admins/destroy/<?= htmlspecialchars($user['id']) ?>">

    <h2>Are you sure you want to delete this user (<?= htmlspecialchars($user['last_name']) ?>, <?= htmlspecialchars($user['first_name']) ?>)?</h2>
    <button type="submit">Delete User</button>

</form>
