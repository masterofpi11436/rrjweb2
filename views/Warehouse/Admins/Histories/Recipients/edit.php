<form action="/warehouse/managers/history/monthly-list">
    <button>Cancel</button>
</form>

<form action="/warehouse/managers/history/monthly-list/update/<?= htmlspecialchars($recipient['id']) ?>" method="post">
    <?php require "form.php"; ?>
</form>