<div class="form-container">
    <div>
        <label for="inmate_number">Inmate ID:</label>
        <input type="text" id="inmate_number" name="inmate_number" value="<?= isset($name) ? htmlspecialchars($name['inmate_number'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($name) ? htmlspecialchars($name['first_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["first_name"])): ?>
        <p><?= $errorMessage["first_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($name) ? htmlspecialchars($name['last_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["last_name"])): ?>
        <p><?= $errorMessage["last_name"] ?></p>
    <?php endif; ?>

    <div>
        <button type="submit">Save</button>
    </div>
</div>