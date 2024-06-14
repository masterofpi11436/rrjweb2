<form action="/programs/admins/one/<?= htmlspecialchars($contractor["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/programs/admins/delete/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Delete Contractor</button>
</form>

<form method="post" action="/programs/admins/update/<?= htmlspecialchars($contractor['id']) ?>">
    <?php require "contractor_form.php"; ?>
</form>