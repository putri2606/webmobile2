<?php
include 'db1.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data kontak
$sql = "SELECT address, phone, email FROM contact_info WHERE id = 1";  // Anda bisa sesuaikan dengan id spesifik
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $address = $row['address'];
    $phone = $row['phone'];
    $email = $row['email'];
} else {
    $address = 'Alamat belum diatur';
    $phone = 'Nomor belum diatur';
    $email = 'Email belum diatur';
}
?>

<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
    font-weight: bold;
}

form {
    margin-top: 20px;
}

label {
    font-weight: 600;
    color: #555;
}

.form-control {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

button.btn {
    font-size: 16px;
    padding: 10px;
    border-radius: 4px;
    width: 100%;
    margin-bottom: 10px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c82333;
}

a.btn {
    text-decoration: none;
    color: white;
}

</style>

<form method="POST" action="update_contact.php">
    <label for="address">Alamat:</label>
    <input type="text" id="address" name="address" required>
    
    <label for="phone">Telepon:</label>
    <input type="text" id="phone" name="phone" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <button type="submit">Simpan</button>
</form>
<a href="dashboard_admin.php" class="btn btn-danger">Kembali</a>

