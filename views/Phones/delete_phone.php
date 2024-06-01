<a href="/phones/one/<?= $phone["id"] ?>">Cancel</a>

<form method="post" action="/phones/destroy/<?= htmlspecialchars($phone['id']) ?>">

    <h2>Are you sure you want to delete this extension listing?</h2>
    <button type="submit">Delete Extension</button>

</form>
