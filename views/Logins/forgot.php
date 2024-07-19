<form action="/verify" method="post">
    <label for="email">Please enter your work email address:</label>
    <input type="email" id="email" name="email" placeholder="Work Email">

    <button>Submit</button>
</form>

<?php if (!empty($errorMessage)): ?>
    <p><?php echo htmlspecialchars($errorMessage); ?></p>
<?php endif; ?>

<form action="/login">
    <button>Cancel</button>
</form>