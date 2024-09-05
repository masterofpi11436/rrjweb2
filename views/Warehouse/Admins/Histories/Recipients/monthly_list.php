<form action="/warehouse/managers/history/monthly">
    <button>Go Back</button>
</form>

<form action="/warehouse/managers/history/monthly-list/add">
    <button>Add Recipient</button>
</form>

<?php if (!empty($monthly)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monthly as $month): ?>
                <tr>
                    <td><?= htmlspecialchars($month['first_name']) ?> <?= htmlspecialchars($month['last_name']) ?></td>
                    <td><?= htmlspecialchars($month['email']) ?></td>
                    <td><a href="/warehouse/managers/history/monthly-list/edit/<?= $month['id'] ?>">Edit</a>/<a href="/warehouse/managers/history/monthly-list/destroy/<?= $month['id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No names on the list.</p>
<?php endif; ?>