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

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Registration logic
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM login_admin WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Username already exists.";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO login_admin (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $user);
            $stmt->bindParam(':password', $pass);

            if ($stmt->execute()) {
                echo "Registration successful. Please login.";
            } else {
                echo "Registration failed.";
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // Validate credentials
        $stmt = $conn->prepare("SELECT * FROM login_admin WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Login successful
            header("Location: tesdaftar.html");
            exit;
        } else {
            echo "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right,rgb(255, 255, 255),rgb(255, 255, 255));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color:rgb(0, 0, 0);
        }
        form {
            margin-bottom: 20px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #7AB730;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #7AB730;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">

        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <button class="expand-btn" onclick="window.location.href='register.php'">Daftar</button>

        <div class="footer">
            &copy; 2024 Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
