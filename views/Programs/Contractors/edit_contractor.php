<form action="/programs/contractors/one/<?= htmlspecialchars($contractor["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/programs/contractors/delete/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Delete Contractor</button>
</form>

<form method="post" action="/programs/contractors/update/<?= htmlspecialchars($contractor['id']) ?>">
    <?php require "contractor_form.php"; ?>
</form>