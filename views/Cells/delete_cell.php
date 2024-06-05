<a href="/cells/one/<?= $cell["id"] ?>">Cancel</a>

<form method="post" action="/cells/destroy/<?= htmlspecialchars($cell['id']) ?>">

    <h2>Are you sure you want to delete this listing?</h2>
    <button type="submit">Delete Contact</button>

</form>
