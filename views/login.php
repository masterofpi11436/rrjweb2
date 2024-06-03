<form method="post" action="/login/auth">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?= isset($user) ? htmlspecialchars($user["email"]) : '' ?>" required>

    <?php if (isset($errorMessage["email"])): ?>
        <p><?= $errorMessage["email"] ?></p>
    <?php endif; ?>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?= isset($user) ? htmlspecialchars($user["password"]) : '' ?>" required>

    <?php if (isset($errorMessage["password"])): ?>
        <p><?= $errorMessage["password"] ?></p>
    <?php endif; ?>

    <button>Log In</button>

</form>