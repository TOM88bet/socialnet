<?php
require_once __DIR__ . '/../includes/session.php';
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Out - SocialNet</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Signed Out</h1>
    <p>Your session has been cleared.</p>
</body>
</html>
