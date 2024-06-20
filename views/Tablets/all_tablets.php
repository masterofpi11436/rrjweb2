<form action="/tablets/add">
    <button>Add New Inmate</button>
</form>

<form method="get" action="/tablets/all">
    <input type="text" name="search" placeholder="Search tablets..." class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($tablets)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <?php
                    $search = htmlspecialchars($_GET['search'] ?? '');
                    $currentOrder = $_GET['order'] ?? 'asc';
                    $newOrder = ($currentOrder === 'asc') ? 'desc' : 'asc';
                ?>
                <th>
                    <a href="?search=<?= $search ?>&sort=inmate_number&order=<?= $newOrder ?>">Inmate Number</a>
                </th>
                <th>
                    <a href="?search=<?= $search ?>&sort=last_name&order=<?= $newOrder ?>">Last Name</a>
                </th>
                <th>
                    <a href="?search=<?= $search ?>&sort=first_name&order=<?= $newOrder ?>">First Name/Initial</a>
                </th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tablets as $tablet): ?>
                <tr>
                    <td><?= htmlspecialchars($tablet['inmate_number']) ?></td>
                    <td><?= htmlspecialchars($tablet['last_name']) ?></td>
                    <td><?= htmlspecialchars($tablet['first_name']) ?></td>
                    <td><?= htmlspecialchars($tablet['note']) ?></td>
                    <td>
                        <a href="/tablets/one/<?= htmlspecialchars($tablet['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tablets found.</p>
<?php endif; ?>