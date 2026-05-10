<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $description = trim($_POST["description"]);
    $username = $_SESSION["username"];

    $sql = "UPDATE account SET description = ? WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $description, $username);

    if ($stmt->execute()) {
        $message = "Profile updated successfully.";
    } else {
        $message = "Failed to update profile.";
    }
}

$username = $_SESSION["username"];

$sql = "SELECT fullname, description FROM account WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - SocialNet</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <?php include 'menubar.php'; ?>

    <h1>Settings</h1>

    <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION["username"]); ?></p>

    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user["fullname"]); ?></p>

    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST">

        <label>Profile Description</label>
        <br><br>

        <textarea
            name="description"
            rows="8"
            cols="60"
        ><?php echo htmlspecialchars($user["description"] ?? ""); ?></textarea>

        <br><br>

        <button type="submit">Save Changes</button>

    </form>

</body>
</html>