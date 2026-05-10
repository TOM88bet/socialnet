<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit;
}

$owner = isset($_GET["owner"]) ? trim($_GET["owner"]) : $_SESSION["username"];

$sql = "SELECT username, fullname, description FROM account WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $owner);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $profile = $result->fetch_assoc();
} else {
    $profile = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - SocialNet</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <?php include 'menubar.php'; ?>

    <h1>Profile Page</h1>

    <?php if ($profile): ?>

        <p><strong>Owner:</strong> <?php echo htmlspecialchars($profile["username"]); ?></p>
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($profile["fullname"]); ?></p>

        <h3>Profile Content</h3>

        <p>
            <?php
            if (!empty($profile["description"])) {
                echo nl2br(htmlspecialchars($profile["description"]));
            } else {
                echo "No profile content yet.";
            }
            ?>
        </p>

    <?php else: ?>

        <p>User not found.</p>

    <?php endif; ?>

</body>
</html>