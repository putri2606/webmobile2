<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location_from = $_POST['location_from'];
    $location_to = $_POST['location_to'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $image = $_FILES['image']['name'];

    // Cek apakah ada gambar yang diupload
    if ($image) {
        // Path untuk menyimpan gambar
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        
        // Pindahkan gambar yang diupload ke direktori yang ditentukan
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Gambar berhasil diupload, simpan path-nya di database
            $image_path = $target_file;
        } else {
            // Jika gagal upload gambar, tetap simpan tanpa gambar
            $image_path = $row['image']; // Tidak mengganti gambar jika gagal upload
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar yang lama
        $image_path = $_POST['existing_image']; // Ambil gambar yang sudah ada
    }

    // Update data paket dengan gambar baru
    $sql = "UPDATE packages SET name=?, location_from=?, location_to=?, date=?, price=?, status=?, type=?, image=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisssi", $name, $location_from, $location_to, $date, $price, $status, $type, $image_path, $id);
    
    if ($stmt->execute()) {
        header("Location: dashboard_admin.php?success=true");
    } else {
        header("Location: dashboard_admin.php?error=true");
    }
}
?>
