<a href="/programs/volunteers/one/<?= $volunteer["id"] ?>">Cancel</a>

<form method="post" action="/programs/volunteers/destroy/<?= htmlspecialchars($volunteer['id']) ?>">

    <h2>Are you sure you want to delete the <?= htmlspecialchars($volunteer['last_name']) ?>?</h2>
    <button type="submit">Delete Volunteer</button>

</form>
