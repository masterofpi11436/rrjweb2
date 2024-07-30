<form action="/warehouse/managers/request/update/<?= htmlspecialchars($order['id']); ?>" method="post">
    <div>
        <label for="note">Notes:</label>
        <textarea id="note" name="note" rows="4" cols="50"><?= isset($order) ? htmlspecialchars($order['note'] ?? '') : '' ?></textarea>
    </div>

    <!-- Hidden input to indicate note update -->
    <input type="hidden" name="update_note" value="1">

    <div>
        <button type="submit">Submit Edited Request</button>
    </div>
</form>

