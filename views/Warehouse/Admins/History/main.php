<form action="/warehouse/dashboard">
    <button>Back to Dashboard</button>
</form>

<br>

<form action="/warehouse/admins/history">
    <button>Monthly Reports</button>
</form>

<form action="/warehouse/admins/history">
    <button>Current Yearly Report</button>
</form>

<form action="/warehouse/admins/history/denied">
    <button>Denied Requests</button>
</form>

<h2>Sections</h2>

<?php foreach($sections as $section): ?>
    <form action="/warehouse/admins/history/section/<?= $section['id'] ?>">
        <button><?= $section['name'] ?></button>
    </form>
<?php endforeach; ?>