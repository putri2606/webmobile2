<?php
// Database connection settings
$host = 'localhost';
$db_name = 'admin_novavil';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM login_admin WHERE username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $message = "Username already exists.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO login_admin (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':password', $pass);

        if ($stmt->execute()) {
            header("Location: login.php?message=registered");
            exit;
        } else {
            $message = "Registration failed.";
        }
    }
}
?>

<!-- registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 400px; text-align: center; }
        input, button { width: 100%; margin: 10px 0; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button { background: #4facfe; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #00f2fe; }
        .footer { margin-top: 20px; font-size: 0.9em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($message)) echo "<p style='color: red;'>$message</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Already have an account? <a href="admin.php">Login here</a>.</p>
    </div>
</body>
</html>