<form action="/contractors/add">
    <button>Add New Extension</button>
</form>

<form method="get" action="/contractors/all">
    <input type="text" name="search" placeholder="Search Contractor" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($contractors)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contractors as $contractor): ?>
                <tr>
                    <td><?= htmlspecialchars($contractor['last_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($contractor['first_name'] ?? '') ?></td>
                    <td>
                        <a href="/contractors/one/<?= htmlspecialchars($contractor['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Contractor Found.</p>
<?php endif; ?>