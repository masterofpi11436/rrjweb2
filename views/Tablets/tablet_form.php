<style>
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .form-container div {
        margin-bottom: 15px;
        margin-right: 15px;
    }
    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .form-container input[type="text"],
    .form-container input[type="number"],
    .form-container input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .form-container input[type="checkbox"] {
        margin-left: 10px;
    }
    .form-container button {
        width: 100%;
        padding: 10px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .form-container button:hover {
        background-color: #0056b3;
    }
</style>

<div class="form-container">
    <div>
        <label for="inmate_number">Inmate Number:</label>
        <input type="number" id="inmate_number" name="inmate_number" value="<?= isset($tablet) ? htmlspecialchars($tablet['inmate_number'] ?? '') : '' ?>" required>
    </div>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($tablet) ? htmlspecialchars($tablet['last_name'] ?? '') : '' ?>" required>
    </div>

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($tablet) ? htmlspecialchars($tablet['first_name'] ?? '') : '' ?>" required>
    </div>

    <div>
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name" value="<?= isset($tablet) ? htmlspecialchars($tablet['middle_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="date_found">Date Found:</label>
        <input type="date" id="date_found" name="date_found" value="<?= htmlspecialchars($tablet['date_found'] ?? '') ?>">
    </div>

    <div>
        <label for="is_reported">101 Charge:</label>
        <input type="checkbox" id="is_reported" name="is_reported" <?= isset($tablet) && $tablet['is_reported'] ? 'checked' : '' ?>>
    </div>

    <div>
        <label for="is_filed">Filed With Inmate Accounts:</label>
        <input type="checkbox" id="is_filed" name="is_filed" <?= isset($tablet) && $tablet['is_filed'] ? 'checked' : '' ?>>
    </div>

    <div>
        <label for="is_charged">Charged By Inmate Accounts:</label>
        <input type="checkbox" id="is_charged" name="is_charged" <?= isset($tablet) && $tablet['is_charged'] ? 'checked' : '' ?>>
    </div>

    <div>
        <label for="is_paid">Payment Status:</label>
        <input type="checkbox" id="is_paid" name="is_paid" <?= isset($tablet) && $tablet['is_paid'] ? 'checked' : '' ?>>
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>
