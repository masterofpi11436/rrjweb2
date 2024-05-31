<form method="post" action="/login/auth">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?= isset($user) ? htmlspecialchars($user["email"]) : '' ?>" required>

    <label for="password">Password:</label>
    <input type="text" id="password" name="password" value="<?= isset($user) ? htmlspecialchars($user["password"]) : '' ?>" required>

    <button>Log In</button>

</form>