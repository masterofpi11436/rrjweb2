<form action="/warehouse/admins/all">
    <button>Warehouse Users</button>
</form>

<form action="/warehouse/items/all">
    <button>Warehouse Items</button>
</form>

<form action="/warehouse/itemtype/all">
    <button>Warehouse Item Types</button>
</form>

<form action="/warehouse/sections/all">
    <button>Warehouse Sections</button>
</form>

<form action="/warehouse/admins/history">
    <button>History</button>
</form>

<h1>Current Requests</h1>

<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Supervisor</th>
            <th>Section</th>
            <th>Items</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Date Approved</th>
            <th>Approved By</th>
            <th>View Order</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>
            <tr>
                <td><?= $order['user_last_name'] ?></td>
                <td><?= $order['supervisor_last_name'] ?></td>
                <td><?= $order['section_name'] ?></td>
                <td><?= $order['items'] ?></td>
                <td><?= $order['status'] ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= $order['approved_at'] ?></td>
                <td><?= $order['approved_by'] ?></td>
                <td>
                    <form action="/warehouse/managers/one/<?= $order['id'] ?>">
                        <button>View</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>