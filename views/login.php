<?php 

$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (strpos($userAgent, 'Edge') !== false) {
    echo "For the best experience, please use a different browser.";
}
?>
<form method="post" action="/login/auth">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?= isset($user) ? htmlspecialchars($user["email"]) : '' ?>" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?= isset($user) ? htmlspecialchars($user["password"]) : '' ?>" required>

    <button>Log In</button>

</form>

<?php if (isset($errorMessage)): ?>
    <p><?= $errorMessage ?></p>
<?php endif; ?>