<form action="/warehouse/itemtype/one/<?= htmlspecialchars($itemType["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/warehouse/itemtype/delete/<?= htmlspecialchars($itemType['id']) ?>">
    <button>Delete Type</button>
</form>

<form method="post" action="/warehouse/itemtype/update/<?= htmlspecialchars($itemType['id']) ?>">
    <?php require "itemType_form.php"; ?>
</form>