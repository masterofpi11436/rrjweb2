<form action="/cells/one/<?= htmlspecialchars($cell["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/cells/delete/<?= htmlspecialchars($cell['id']) ?>">
    <button>Delete Extension</button>
</form>

<form method="post" action="/cells/update/<?= htmlspecialchars($cell['id']) ?>">
    <?php require "cell_form.php"; ?>
</form>