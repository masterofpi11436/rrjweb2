<form action="/warehouse/dashboard">
    <button>Back</button>
</form>

<p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
<p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
<p><strong>Date Created:</strong> <?= htmlspecialchars($order['created_at']) ?></p>

<form action="/warehouse/managers/request/edit/<?= htmlspecialchars($order['id']) ?>">
    <button>Edit</button>
</form>

<h2>Items</h2>
<table>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($order['items'] as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form id="approveForm" action="/warehouse/managers/request/approve_print/<?= htmlspecialchars($order['id']) ?>" method="post">
    <button type="submit" onclick="return confirmApprove()">Approve</button>
</form>

<form action="/warehouse/managers/request/deny_note/<?= htmlspecialchars($order['id']) ?>">
    <button type="submit">Deny</button>
</form>