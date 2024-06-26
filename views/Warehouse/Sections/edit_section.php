<form action="/warehouse/sections/one/<?= htmlspecialchars($section["id"]) ?>">
    <button>Cancel</button>
</form>

<form action="/warehouse/sections/delete/<?= htmlspecialchars($section['id']) ?>">
    <button>Delete Section</button>
</form>

<form method="post" action="/warehouse/sections/update/<?= htmlspecialchars($section['id']) ?>">
    <?php require "section_form.php"; ?>
</form>