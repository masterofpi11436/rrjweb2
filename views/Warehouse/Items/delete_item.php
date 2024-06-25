<a href="/warehouse/items/one/<?= $item["id"] ?>">Cancel</a>

<form method="post" action="/warehouse/items/destroy/<?= htmlspecialchars($item['id']) ?>">

    <h2>Are you sure you want to delete the <?= htmlspecialchars($item['name']) ?> item?</h2>
    <button type="submit">Delete Item</button>

</form>
