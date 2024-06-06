<form action="/mailrooms/add">
    <button>Add New Name</button>
</form>

<form method="get" action="/mailrooms/all">
    <input type="text" name="search" placeholder="Search Name or Inmate ID" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($names)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Inmate Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($names as $name): ?>
                <tr>
                    <td><?= htmlspecialchars($name['inmate_number'] ?? '') ?></td>
                    <td><?= htmlspecialchars($name['first_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($name['last_name'] ?? '') ?></td>
                    <td>
                        <a href="/mailrooms/one/<?= htmlspecialchars($name['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Name Found.</p>
<?php endif; ?>