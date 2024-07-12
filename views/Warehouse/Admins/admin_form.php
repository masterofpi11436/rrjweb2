<div class="form-container">
    
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($admin) ? htmlspecialchars($admin['first_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["first_name"])): ?>
        <p><?= $errorMessage["first_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($admin) ? htmlspecialchars($admin['last_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["last_name"])): ?>
        <p><?= $errorMessage["last_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= isset($admin) ? htmlspecialchars($admin['email'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["email"])): ?>
        <p><?= $errorMessage["email"] ?></p>
    <?php endif; ?>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="">
    </div>

    <?php if (isset($errorMessage["password"])): ?>
        <p><?= $errorMessage["password"] ?></p>
    <?php endif; ?>

    <div>
        <label for="role_id">Role:</label>
        <select id="role_id" name="role_id">
            <option value="8" <?= isset($admin) && $admin['role_id'] == 8 ? 'selected' : '' ?>>Warehouse Manager</option>
            <option value="11" <?= isset($admin) && $admin['role_id'] == 11 ? 'selected' : '' ?>>Warehouse Supervisor</option>
            <option value="9" <?= isset($admin) && $admin['role_id'] == 9 ? 'selected' : '' ?>>Supervisor</option>
            <option value="10" <?= isset($admin) && $admin['role_id'] == 10 ? 'selected' : '' ?>>User</option>
            <!-- Add more roles as needed -->
        </select>
    </div>

    <div>
        <button type="submit" onclick="return validatePassword()">Save</button>
    </div>
</div>