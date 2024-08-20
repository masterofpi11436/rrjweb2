<form method="post" action="/warehouse/login/auth">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?= isset($user) ? htmlspecialchars($user["email"]) : '' ?>" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?= isset($user) ? htmlspecialchars($user["password"]) : '' ?>" required>

    <button>Log In</button>

</form><br>

<form action="/forgot">
    <button>Forgot Password</button>
</form>

<?php if (isset($errorMessage)): ?>
    <p><?= $errorMessage ?></p>
<?php endif; ?>