<a href="/phones/one/<?= $phone["id"] ?>">Cancel</a>

<form method="post" action="/phones/destroy/<?= htmlspecialchars($phone['id']) ?>">

    <h2>Are you sure you want to delete the <?= htmlspecialchars($phone['name']) ?> listing?</h2>
    <button type="submit">Delete Listing</button>

</form>
