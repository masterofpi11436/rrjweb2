<form action="/programs/volunteers/add">
    <button>Add New volunteerolunteer</button>
</form>

<form method="get" action="/programs/volunteers/all">
    <input type="text" name="search" placeholder="Search Last Name or First Name" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($volunteers)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($volunteers as $volunteer): ?>
                <tr>
                    <td><?= htmlspecialchars($volunteer['last_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($volunteer['first_name'] ?? '') ?></td>
                    <td>
                        <a href="/volunteers/one/<?= htmlspecialchars($volunteer['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Extension Found.</p>
<?php endif; ?>