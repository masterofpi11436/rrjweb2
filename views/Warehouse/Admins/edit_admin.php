<form action="/warehouse/admins/one/<?= htmlspecialchars($admin["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/warehouse/admins/delete/<?= htmlspecialchars($admin['id']) ?>">
    <button>Delete User</button>
</form>

<form method="post" action="/warehouse/admins/update/<?= htmlspecialchars($admin['id']) ?>">
    <?php require "admin_form.php"; ?>
</form>