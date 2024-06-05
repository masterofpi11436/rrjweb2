<a href="/mailrooms/one/<?= $name["id"] ?>">Cancel</a>

<form method="post" action="/mailrooms/destroy/<?= htmlspecialchars($name['id']) ?>">

    <h2>Are you sure you want to delete <?= htmlspecialchars($name["last_name"]) ?>, <?= htmlspecialchars($name["first_name"])?>?</h2>
    <button type="submit">Delete Name</button>

</form>
