<div>
    <label for="inmate_number">Inmate Number:</label>
    <input type="number" id="inmate_number" name="inmate_number" value="<?= isset($tablet) ? htmlspecialchars($tablet['inmate_number']) : '' ?>" required>
</div>

<div>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?= isset($tablet) ? htmlspecialchars($tablet['first_name']) : '' ?>" required>
</div>

<div>
    <label for="middle_name">Middle Name:</label>
    <input type="text" id="middle_name" name="middle_name" value="<?= isset($tablet) ? htmlspecialchars($tablet['middle_name']) : '' ?>">
</div>

<div>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?= isset($tablet) ? htmlspecialchars($tablet['last_name']) : '' ?>" required>
</div>

<div>
    <label for="date_found">Date Found:</label>
    <input type="date" id="date_found" name="date_found" value="<?= htmlspecialchars($tablet['date_found'] ?? '') ?>">
</div>

<div>
    <label for="is_reported">Is Reported:</label>
    <input type="checkbox" id="is_reported" name="is_reported" <?= isset($tablet) && $tablet['is_reported'] ? 'checked' : '' ?>>
</div>

<div>
    <label for="is_charged">Is Charged:</label>
    <input type="checkbox" id="is_charged" name="is_charged" <?= isset($tablet) && $tablet['is_charged'] ? 'checked' : '' ?>>
</div>

<div>
    <button>Save</button>
</div>
