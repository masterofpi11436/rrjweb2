<form action="/mailrooms/one/<?= htmlspecialchars($name["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/mailrooms/delete/<?= htmlspecialchars($name['id']) ?>">
    <button>Delete Name</button>
</form>

<form method="post" action="/mailrooms/update/<?= htmlspecialchars($name['id']) ?>">
    <?php require "mailroom_form.php"; ?>
</form>