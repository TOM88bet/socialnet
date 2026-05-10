<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $fullname = trim($_POST['fullname']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($fullname) && !empty($password)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO account (username, fullname, password)
                VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $fullname, $hashedPassword);

        if ($stmt->execute()) {
            $message = "User created successfully";
        } else {
            $message = "Failed to create user";
        }

        $stmt->close();
    } else {
        $message = "Please fill all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User - SocialNet</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <h1>Create New User</h1>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">

        <div>
            <label>Username</label><br>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Full Name</label><br>
            <input type="text" name="fullname" required>
        </div>

        <br>

        <div>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Create User</button>

    </form>

</body>
</html>