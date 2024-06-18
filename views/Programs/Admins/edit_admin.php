<form action="/programs/admins/one/<?= htmlspecialchars($admin["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/programs/admins/delete/<?= htmlspecialchars($admin['id']) ?>">
    <button>Delete Contractor Admin</button>
</form>

<form method="post" action="/programs/admins/update/<?= htmlspecialchars($admin['id']) ?>">
    <?php require "admin_form.php"; ?>
</form>