<form action="/volunteers/one/<?= htmlspecialchars($volunteer["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/volunteers/delete/<?= htmlspecialchars($volunteer['id']) ?>">
    <button>Delete Extension</button>
</form>

<form method="post" action="/volunteers/update/<?= htmlspecialchars($volunteer['id']) ?>">
    <?php require "volunteer_form.php"; ?>
</form>