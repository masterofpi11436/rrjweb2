<form action="/tablets/one/<?= $tablet["id"] ?>">
    <button>Cancel</button>
</form>

<form action="/tablets/delete/<?= htmlspecialchars($tablet['id']) ?>">
    <button>Delete Tablet</button>
</form>

<form>
    <label for="paste-input">Paste Info:</label>
    <input type="text" id="paste-input" oninput="parseInput()" placeholder="[number] [last name], [first name] [middle name]">
</form>

<form method="post" action="/tablets/update/<?= htmlspecialchars($tablet['id']) ?>">
    <?php require "tablet_form.php"; ?>
</form>

