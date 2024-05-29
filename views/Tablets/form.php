<div>
    <label for="inmate_number">Inmate Number:</label>
    <input type="number" id="inmate_number" name="inmate_number" value="<?= htmlspecialchars($tablet['inmate_number']) ?>" required>
</div>

<?php if (isset($errorMessage["inmate_number"])): ?>
    <p><?= $errorMessage["inmate_number"] ?></p>
<?php endif; ?>

<div>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($tablet['first_name']) ?>" required>
</div>

<div>
    <label for="middle_name">Middle Name:</label>
    <input type="text" id="middle_name" name="middle_name" value="<?= htmlspecialchars($tablet['middle_name']) ?>">
</div>

<div>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($tablet['last_name']) ?>" required>
</div>

<?php if (isset($errorMessage["last_name"])): ?>
    <p><?= $errorMessage["last_name"] ?></p>
<?php endif; ?>

<div>
    <label for="date_found">Date Found:</label>
    <input type="date" id="date_found" name="date_found" value="<?= htmlspecialchars($tablet['date_found']) ?>">
</div>

<div>
    <label for="is_reported">Is Reported:</label>
    <input type="checkbox" id="is_reported" name="is_reported" <?= $tablet['is_reported'] ? 'checked' : '' ?>>
</div>

<div>
    <label for="is_charged">Is Charged:</label>
    <input type="checkbox" id="is_charged" name="is_charged" <?= $tablet['is_charged'] ? 'checked' : '' ?>>
</div>

<div>
    <button>Save</button>
</div>