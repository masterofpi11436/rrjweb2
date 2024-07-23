<h2>This Page is under construction.</h2>

<h2>Monthly Requests based on section</h2>

<h2>Year to Date total item count</h2>

<div>
    <?php
        // Get the previous URL from the HTTP referer
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/login';
    ?>
    <form action="<?= htmlspecialchars($previousUrl) ?>">
        <button>Go Back</button>
    </form>
</div>