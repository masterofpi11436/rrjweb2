<form action="/admins/one/<?= htmlspecialchars($user["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/admins/delete/<?= htmlspecialchars($user['id']) ?>">
    <button>Delete User</button>
</form>

<form method="post" action="/admins/update/<?= htmlspecialchars($user['id']) ?>">
    <?php require "user_form.php"; ?>
</form>