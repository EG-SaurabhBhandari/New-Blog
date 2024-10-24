<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Welcome</title>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
        <a href="calculator.php" class="button">Go to Calculator</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
