<a href="/warehouse/itemtype/one/<?= $itemType["id"] ?>">Cancel</a>

<form method="post" action="/warehouse/itemtype/destroy/<?= htmlspecialchars($itemType['id']) ?>">

    <h2>Are you sure you want to delete this <?= htmlspecialchars($itemType['type']) ?> type?</h2>
    <button type="submit">Delete Type</button>

</form>
