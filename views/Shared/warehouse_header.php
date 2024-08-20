<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11" />
    <link rel="stylesheet" href="/public/css/dark.css">
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="/public/css/cart.css">
    <!--[if IE]><link rel="stylesheet" href="/public/css/edge.css"><![endif]-->
    <script src="/public/JavaScript/script.js"></script>
    <title><?= $title ?></title>
</head>
<body>

<header>
    <div>
        <h1><?= $heading ?></h1>
    </div>
<div>

    <?php if (isset($_SESSION['user_first_name']) && isset($_SESSION['user_last_name'])): ?>
        <h3>Welcome: <?= htmlspecialchars($_SESSION['user_last_name'] . ', ' . $_SESSION['user_first_name']); ?>!</h3>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_id'])): ?>

        <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1 && $_SERVER["REQUEST_URI"] !== "/admins/dashboard?" && $_SERVER["REQUEST_URI"] !== "/admins/dashboard"): // Check if the user is an administrator and not on the dashboard ?>
            <div class="admin-back-button-container">
                <form action="/admins/dashboard" method="get" style="display:inline;">
                    <button type="submit">Back to Dashboard</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="logout-button-container">
            <form action="/warehouse/logout" method="post" style="display:inline;">
                <button type="submit">Logout</button>
            </form>
        </div>
    <?php endif; ?>
</div>
    
</header>