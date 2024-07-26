<h2>This Page is under construction.</h2>

<form action="/warehouse/managers/history/monthly">
    <button>Monthly totals</button>
</form>

<form action="/warehouse/managers/history/yearly">
    <button>Yearly totals</button>
</form>

<div>
    <?php
        // Get the previous URL from the HTTP referer
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/login';
    ?>
    <form action="<?= htmlspecialchars($previousUrl) ?>">
        <button>Go Back</button>
    </form>
</div>