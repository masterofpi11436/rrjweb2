<h2>Yearly Report</h2>

    <form method="post" action="">
        <label for="year">Select Year:</label>
        <select id="year" name="year">
            <option value="">All Years</option>
            <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                <option value="<?= $y ?>" <?= isset($selectedYear) && $selectedYear == $y ? 'selected' : '' ?>><?= $y ?></option>
            <?php endfor; ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Supervisor</th>
                    <th>Section</th>
                    <th>Created At</th>
                    <th>Approved By</th>
                    <th>Approved At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['user_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['supervisor_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['section_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($order['approved_denied_by']); ?></td>
                        <td><?php echo htmlspecialchars($order['approved_denied_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No approved orders found for the selected year.</p>
    <?php endif; ?>