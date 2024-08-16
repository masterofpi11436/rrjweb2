<style>
    @media print {
        /* Hide all elements except the table */
        body * {
            visibility: hidden;
        }

        /* Display only the table, header, and footer */
        .printable, .printable * {
            visibility: visible;
        }

        /* Position the table correctly */
        .printable {
            position: absolute;
            left: 0;
            top: 0;
        }

        /* Hide buttons during print */
        button {
            display: none;
        }
    }

    /* Initially hide the approve button */
    #approveBtn {
        display: none;
    }
</style>
<script>
    function printAndShowApprove() {
        // Open the print dialog
        window.print();

        // Show the approve button immediately
        document.getElementById('approveBtn').style.display = 'block';
    }
</script>

<div>

    <p>You must select the print button in order to approve the request.</p>
    <p>Printing is not required, but this button must be pressed in order to approve</p>
    <!-- Print button -->
    <button type="button" onclick="printAndShowApprove()">Print</button>

    <!-- Approve button, initially hidden -->
    <form id="approveForm" action="/warehouse/managers/request/approve/<?= htmlspecialchars($order['id']) ?>" method="post">
        <button id="approveBtn" type="submit">Approve</button>
    </form>

    <form action="/warehouse/managers/request/one/<?= htmlspecialchars($order['id']) ?>">
        <button type="submit">Go Back</button>
    </form>
</div>

<div class="printable">
    <p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
    <p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
    <p><strong>Date Created:</strong> <?= htmlspecialchars($order['created_at']) ?></p>

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
</div>
