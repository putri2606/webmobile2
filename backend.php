<?php
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_GET['action'] ?? '';

if ($action === 'get') {
    $result = $conn->query("SELECT * FROM packages");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($action === 'add') {
    $stmt = $conn->prepare("INSERT INTO packages (type, location, date, name, price, status, image, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssdsis",
        $_POST['type'],
        $_POST['location'],
        $_POST['date'],
        $_POST['name'],
        $_POST['price'],
        $_POST['status'],
        $_POST['image'],
        $_POST['link']
    );
    $stmt->execute();
    echo json_encode(["status" => "success"]);
} elseif ($action === 'update') {
    $stmt = $conn->prepare("UPDATE packages SET type=?, location=?, date=?, name=?, price=?, status=?, image=?, link=? WHERE id=?");
    $stmt->bind_param(
        "ssssdsisi",
        $_POST['type'],
        $_POST['location'],
        $_POST['date'],
        $_POST['name'],
        $_POST['price'],
        $_POST['status'],
        $_POST['image'],
        $_POST['link'],
        $_POST['id']
    );
    $stmt->execute();
    echo json_encode(["status" => "success"]);
} elseif ($action === 'delete') {
    $stmt = $conn->prepare("DELETE FROM packages WHERE id=?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    echo json_encode(["status" => "success"]);
}

$conn->close();
?>
