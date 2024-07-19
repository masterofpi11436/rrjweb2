<h1>Current Requests</h1>

<?php if (!empty($orders)): ?>
<table>
    <thead>
        <tr>
            <th>Supervisor</th>
            <th>Section</th>
            <th>Date Created</th>
            <th>View Order</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>
            <tr>
                <td><?= $order['supervisor_last_name'] ?></td>
                <td><?= $order['section_name'] ?></td>
                <td><?= $order['created_at'] ?></td>
                <td>
                    <form action="/warehouse/managers/one/<?= $order['id'] ?>">
                        <button>View</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p>All caught up on orders.</p>
<?php endif; ?>