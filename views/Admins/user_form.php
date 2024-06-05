<div class="form-container">
    
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($user) ? htmlspecialchars($user['first_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["first_name"])): ?>
        <p><?= $errorMessage["first_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($user) ? htmlspecialchars($user['last_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["last_name"])): ?>
        <p><?= $errorMessage["last_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= isset($user) ? htmlspecialchars($user['email'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["email"])): ?>
        <p><?= $errorMessage["email"] ?></p>
    <?php endif; ?>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?= isset($user) ? htmlspecialchars($user['password'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["password"])): ?>
        <p><?= $errorMessage["password"] ?></p>
    <?php endif; ?>

    <div>
        <label for="role_id">Role:</label>
        <select id="role_id" name="role_id">
            <option value="1" <?= isset($user) && $user['role_id'] == 1 ? 'selected' : '' ?>>Admin</option>
            <option value="2" <?= isset($user) && $user['role_id'] == 2 ? 'selected' : '' ?>>Tablet</option>
            <option value="3" <?= isset($user) && $user['role_id'] == 3 ? 'selected' : '' ?>>Phone</option>
            <!-- Add more roles as needed -->
        </select>
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>