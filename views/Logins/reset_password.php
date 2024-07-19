<?php if (!empty($errorMessage)): ?>
    <p class="error"><?php echo htmlspecialchars($errorMessage); ?></p>
<?php endif; ?>

<form action="/process_password" method="post">
    <input type="hidden" name="reset_token" value="<?php echo htmlspecialchars($token['reset_token']); ?>">

    <label for="new_password">Password</label>
    <input type="password" id="new_password" name="new_password" value="<?= isset($user) ? htmlspecialchars($user['new_password'] ?? '') : '' ?>">

    <label for="confirm_password">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" value="<?= isset($user) ? htmlspecialchars($user['confirm_password'] ?? '') : '' ?>">

    <button>Reset Password</button>
</form>

<form action="/forgot">
    <button>Back to Password Reset</button>
</form>
