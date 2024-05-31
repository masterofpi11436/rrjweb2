<form action="/tablets/one/<?= $tablet["id"] ?>">
    <button>Cancel</button>
</form>

<form action="/tablets/delete/<?= htmlspecialchars($tablet['id']) ?>">
    <button>Delete Tablet</button>
</form>

<form method="post" action="/tablets/update/<?= htmlspecialchars($tablet['id']) ?>">
    <?php require "tablet_form.php"; ?>
</form>

