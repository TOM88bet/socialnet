<?php
require_once __DIR__ . '/../includes/session.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - SocialNet</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <?php include 'menubar.php'; ?>

    <h1>About</h1>

    <p><strong>Student Name:</strong> Vu Duc Tam</p>
    <p><strong>Student Number:</strong> 1695881</p>

</body>
</html>