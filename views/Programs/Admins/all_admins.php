<form action="/programs/dashboard">
    <button>Back to Dashboard</button>
</form>

<form action="/programs/admins/add">
    <button>Add New User</button>
</form>

<form method="get" action="/programs/admins/all">
    <input type="text" name="search" placeholder="Search User..." class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($admins)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= htmlspecialchars($admin['last_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($admin['first_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($admin['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($admin['role_name'] ?? '') ?></td>
                    <td>
                        <a href="/programs/admins/one/<?= htmlspecialchars($admin['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No User Found.</p>
<?php endif; ?>