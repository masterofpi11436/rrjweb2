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

<form id="approveForm" action="/warehouse/managers/request/approve/<?= htmlspecialchars($order['id']) ?>" method="post">
    <button type="submit" onclick="return confirmApprove()">Approve</button>
</form>

<form action="/warehouse/managers/request/deny_note/<?= htmlspecialchars($order['id']) ?>">
    <button type="submit">Deny</button>
</form>

<!-- Print Button -->
<noscript>
    <p>Please enable JavaScript to use the print functionality. If you need assistance, contact MIU!</p>
</noscript>
<button onclick="printOrderDetails()">Print Order Details</button>

<script>
function confirmApprove() {
    if (confirm("Do you want to print the order details?")) {
        printOrderDetails();
    }
    // Submit the form regardless of the user's choice
    return true;
}

function printOrderDetails() {
    var printContents = 
        `<p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
        <p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
        <p><strong>Date Created:</strong> <?= htmlspecialchars($order['created_at']) ?></p>
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
        </table>`;
    
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print Order Details</title>');
    printWindow.document.write('<link rel="stylesheet" href="/public/css/dark.css">');
    printWindow.document.write('<link rel="stylesheet" href="/public/css/styles.css">');
    printWindow.document.write('</head><body>');
    printWindow.document.write(printContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>
