<a href="/warehouse/sections/one/<?= $section["id"] ?>">Cancel</a>

<form method="post" action="/warehouse/sections/destroy/<?= htmlspecialchars($section['id']) ?>">

    <h2>Are you sure you want to delete the <?= htmlspecialchars($section['name']) ?> section?</h2>
    <button type="submit">Delete Section</button>

</form>
