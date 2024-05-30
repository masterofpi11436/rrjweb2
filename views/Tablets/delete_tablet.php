<a href="/tablets/one/<?= $tablet["id"] ?>">Cancel</a>

<form method="post" action="/tablets/destroy/<?= htmlspecialchars($tablet['id']) ?>">

    <h2>Are you sure you want to delete this inmate?</h2>
    <button type="submit">Delete Tablet</button>

</form>
