<form action="/phones/add">
    <button>Add New Extension</button>
</form>

<form method="get" action="/phones/all">
    <input type="text" name="search" placeholder="Search by Name, Section, or Extension" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of extensions -->
<?php if (!empty($phones)): ?>
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
                    <a href="?search=<?= $search ?>&sort=title&order=<?= $newOrder ?>">Title</a>
                </th>
                <th>
                    <a href="?search=<?= $search ?>&sort=section&order=<?= $newOrder ?>">Section</a>
                </th>
                <th>
                    <a href="?search=<?= $search ?>&sort=extension&order=<?= $newOrder ?>">Extension</a>
                </th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phones as $phone): ?>
                <tr>
                    <td><?= htmlspecialchars($phone['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($phone['title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($phone['section'] ?? '') ?></td>
                    <td><?= htmlspecialchars($phone['extension'] ?? '') ?></td>
                    <td><a href="/phones/one/<?= htmlspecialchars($phone['id']) ?>">Details</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Extension Found.</p>
<?php endif; ?>