<form action="/reset-password" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token ?? ''); ?>">

    <div>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <?php if (isset($errorMessage['new_password'])): ?>
            <p style="color:red;"><?= htmlspecialchars($errorMessage['new_password']); ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <?php if (isset($errorMessage['confirm_password'])): ?>
            <p style="color:red;"><?= htmlspecialchars($errorMessage['confirm_password']); ?></p>
        <?php endif; ?>
    </div>

    <button type="submit">Reset Password</button>
    <?php if (isset($errorMessage) && is_string($errorMessage)): ?>
        <p style="color:red;"><?= htmlspecialchars($errorMessage); ?></p>
    <?php endif; ?>
</form>
