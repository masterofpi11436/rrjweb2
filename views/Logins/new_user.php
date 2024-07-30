<?php if (!empty($errorMessage)): ?>
    <p class="error"><?php echo htmlspecialchars($errorMessage); ?></p>
<?php endif; ?>

<form action="/process_new_password" method="post">
    <input type="hidden" name="temp_password" value="<?php echo htmlspecialchars($tempPassword['temp_password']); ?>">

    <label for="new_password">Password</label>
    <input type="password" id="new_password" name="new_password" value="<?= isset($user) ? htmlspecialchars($user['new_password'] ?? '') : '' ?>">

    <label for="confirm_password">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" value="<?= isset($user) ? htmlspecialchars($user['confirm_password'] ?? '') : '' ?>">

    <button>Reset Password</button>
</form>

<form action="/forgot">
    <button>Back to Password Reset</button>
</form>