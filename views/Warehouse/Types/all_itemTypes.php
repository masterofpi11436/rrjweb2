<form action="/warehouse/dashboard">
    <button>Back to Dashboard</button>
</form>

<form action="/warehouse/itemtype/add">
    <button>Add New Type</button>
</form>

<form method="get" action="/warehouse/itemtype/all">
    <input type="text" name="search" placeholder="Search by Type" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of extensions -->
<?php if (!empty($itemTypes)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <?php
                    $search = htmlspecialchars($_GET['search'] ?? '');
                    $currentOrder = $_GET['order'] ?? 'asc';
                    $newOrder = ($currentOrder === 'asc') ? 'desc' : 'asc';
                ?>
                <th>
                    <a href="?search=<?= $search ?>&sort=type&order=<?= $newOrder ?>">Type</a>
                </th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemTypes as $itemType): ?>
                <tr>
                    <td><?= htmlspecialchars($itemType['type'] ?? '') ?></td>
                    <td>
                        <a href="/warehouse/itemtype/one/<?= htmlspecialchars($itemType['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Type Found.</p>
<?php endif; ?>