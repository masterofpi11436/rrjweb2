<form action="/warehouse/managers/request/deny/<?= htmlspecialchars($order['id']) ?>" method="post">
    <div>
        <label for="note">Notes:</label>
        <textarea id="note" name="note" rows="4" cols="50"><?= isset($order) ? htmlspecialchars($order['note'] ?? '') : '' ?></textarea>
    </div>

    <div>
        <button type="submit">Submit Denied Request</button>
    </div>
</form>
