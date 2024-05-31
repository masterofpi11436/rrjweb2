<form action="/tablets/all">
    <button>Cancel</button>
</form>

<form>
    <label for="paste-input">Paste Info:</label>
    <input type="text" id="paste-input" oninput="parseInput()" placeholder="[number] [last name], [first name] [middle name]">
</form>

<form method="post" action="/tablets/create">
    <?php require "tablet_form.php"; ?>
</form>