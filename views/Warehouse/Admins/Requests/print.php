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
    </style>
    <script>
        function printTable() {
            window.print();
        }
    </script>

<div>
        <form>
            <button type="button" onclick="printTable()">Print</button>
        </form>

        <form action="/warehouse/managers/request/approve/<?= htmlspecialchars($order['id']) ?>" method="post">
            <button>Approve</button>
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