<form action="/phones/one/<?= $phone["id"] ?>">
    <button>Cancel</button>
</form>

<form action="/phones/delete/<?= htmlspecialchars($phone['id']) ?>">
    <button>Delete Extension</button>
</form>

<form method="post" action="/phones/update/<?= htmlspecialchars($phone['id']) ?>">
    <?php require "phone_form.php"; ?>
</form>

