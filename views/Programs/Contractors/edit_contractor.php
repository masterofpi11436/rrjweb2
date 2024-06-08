<form action="/contractors/one/<?= htmlspecialchars($contractor["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/contractors/delete/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Delete Extension</button>
</form>

<form method="post" action="/contractors/update/<?= htmlspecialchars($contractor['id']) ?>">
    <?php require "contractor_form.php"; ?>
</form>