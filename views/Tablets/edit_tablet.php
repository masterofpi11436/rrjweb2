<a href="/tablets/one/<?= $tablet["id"] ?>">Cancel</a>

<a href="/tablets/delete/<?= htmlspecialchars($tablet['id']) ?>">Delete Tablet</a>

<form method="post" action="/tablets/update/<?= htmlspecialchars($tablet['id']) ?>">
    <?php require "tablet_form.php"; ?>
</form>

