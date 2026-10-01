<?php
require_once __DIR__ . '/auth/roles.php';

// STEP 1: If the user is NOT an admin, redirect to /no-access.php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin Panel</h1>
    <p>You can manage users and all content here.</p>

    <nav>
        <a href="/dashboard.php">Dashboard</a>
        <a href="/editor.php">Editor Panel</a>
        <a href="/logout.php">Log Out</a>
    </nav>
</body>
</html>
