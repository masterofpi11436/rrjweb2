<form action="/reset-password" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
    <input type="password" name="new_password" placeholder="New Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button type="submit">Reset Password</button>
</form>