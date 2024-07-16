<form action="/warehouse/dashboard">
    <button>Back to Dashboard</button>
</form>

<button>Print</button><br>
<button>Approve</button>
<button>Deny</button>

<h2>Section: <?php echo htmlspecialchars($order['section_name']); ?></h2>
<h2>Supervisor: <?php echo htmlspecialchars($order['supervisor_last_name']); ?></h2>



    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>