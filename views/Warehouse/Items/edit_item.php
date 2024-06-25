<form action="/warehouse/items/one/<?= htmlspecialchars($item["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/warehouse/items/delete/<?= htmlspecialchars($item['id']) ?>">
    <button>Delete Item</button>
</form>

<form method="post" action="/warehouse/items/update/<?= htmlspecialchars($item['id']) ?>">
    <?php require "item_form.php"; ?>
</form>