<?php if (!is_null($user['warehouse_role'])): ?>
    <form action="/admins/switchRole" method="post">
        <button type="submit" name="warehouse_role" value="<?php echo $user['warehouse_role']; ?>">Warehouse Supply Request</button>
    </form>
<?php endif; ?>

<form action="/cells/add">
    <button>Add New Extension</button>
</form>

<form method="get" action="/cells/all">
    <input type="text" name="search" placeholder="Search exentsions..." class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($cells)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Job Description</th>
                <th>PID</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cells as $cell): ?>
                <tr>
                    <td><?= htmlspecialchars($cell['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['description'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['pid'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['phone'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['email'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Extension Found.</p>
<?php endif; ?>