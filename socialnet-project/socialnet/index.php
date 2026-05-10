<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit;
}

$currentUser = $_SESSION["username"];
$currentFullname = $_SESSION["fullname"];

$sql = "SELECT username, fullname FROM account WHERE id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();

$users = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SocialNet</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <?php include 'menubar.php'; ?>

    <h1>Welcome to SocialNet</h1>

    <h3>Your Information</h3>

    <p>
        <strong>Username:</strong>
        <?php echo htmlspecialchars($currentUser); ?>
    </p>

    <p>
        <strong>Full Name:</strong>
        <?php echo htmlspecialchars($currentFullname); ?>
    </p>

    <h3>Other Users</h3>

    <ul>
        <?php while ($user = $users->fetch_assoc()) : ?>
            <li>
                <a href="profile.php?owner=<?php echo urlencode($user['username']); ?>">
                    <?php echo htmlspecialchars($user['fullname']); ?>
                    (<?php echo htmlspecialchars($user['username']); ?>)
                </a>
            </li>
        <?php endwhile; ?>
    </ul>

</body>
</html>