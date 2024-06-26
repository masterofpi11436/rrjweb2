<form action="/warehouse/dashboard">
    <button>Back to Dashboard</button>
</form>

<form action="/warehouse/items/add">
    <button>Add New Item</button>
</form>

<form method="get" action="/warehouse/items/all">
    <input type="text" name="search" placeholder="Search by Name or Type" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of extensions -->
<?php if (!empty($items)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <?php
                    $search = htmlspecialchars($_GET['search'] ?? '');
                    $currentOrder = $_GET['order'] ?? 'asc';
                    $newOrder = ($currentOrder === 'asc') ? 'desc' : 'asc';
                ?>
                <th>
                    <a href="?search=<?= $search ?>&sort=name&order=<?= $newOrder ?>">Name</a>
                </th>
                <th>
                    <a href="?search=<?= $search ?>&sort=item_type&order=<?= $newOrder ?>">Item Type</a>
                </th>
                <th>Image</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($item['item_type'] ?? '') ?></td>
                    <td><?= htmlspecialchars($item['image'] ?? '') ?></td>
                    <td>
                        <a href="/warehouse/items/one/<?= htmlspecialchars($item['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Item Found.</p>
<?php endif; ?>