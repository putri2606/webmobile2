<?php
include 'db1.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);

    $sql = "UPDATE contact_info SET address='$address', phone='$phone', email='$email' WHERE id = 1";
    
    if ($conn->query($sql) === TRUE) {
        echo "Kontak berhasil diperbarui.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
