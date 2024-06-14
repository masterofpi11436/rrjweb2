<form action="/programs/volunteers/one/<?= htmlspecialchars($volunteer["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/programs/volunteers/delete/<?= htmlspecialchars($volunteer['id']) ?>">
    <button>Delete Volunteer</button>
</form>

<form method="post" action="/programs/volunteers/update/<?= htmlspecialchars($volunteer['id']) ?>">
    <?php require "volunteer_form.php"; ?>
</form>