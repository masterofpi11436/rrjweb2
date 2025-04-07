<h1>Warehouse Store Login</h1>

<form method="post" action="/warehouse/login/auth">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?= isset($user) ? htmlspecialchars($user["email"]) : '' ?>" >
    <?php if (isset($errors['email'])): ?>
        <p class="error"><?= htmlspecialchars($errors['email']) ?></p>
    <?php endif; ?>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?= isset($user) ? htmlspecialchars($user["password"]) : '' ?>" >
    <?php if (isset($errors['password'])): ?>
        <p class="error"><?= htmlspecialchars($errors['password']) ?></p>
    <?php endif; ?>

    <button>Log In</button>

</form><br>

<form action="/forgot">
    <button>Forgot Password</button>
</form>

<?php if (isset($errorMessage)): ?>
    <p><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>
