<?php
include 'db.php';

// Fetch data dari database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Dashboard Admin</h1>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Paket berhasil diupdate!</div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">Gagal mengupdate paket. Coba lagi!</div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Paket</th>
                    <th>Dari</th>
                    <th>Ke</th>
                    <th>Tanggal</th>
                    <th>Harga (IDR)</th>
                    <th>Status</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['location_from'] ?></td>
                        <td><?= $row['location_to'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= number_format($row['price'], 2) ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['type'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="update_package.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Paket</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Paket</label>
                                            <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="location_from" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" name="location_from" value="<?= $row['location_from'] ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="location_to" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" name="location_to" value="<?= $row['location_to'] ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="date" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" name="date" value="<?= $row['date'] ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Harga (IDR)</label>
                                            <input type="number" class="form-control" name="price" value="<?= $row['price'] ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="status" required>
                                                <option value="Active" <?= $row['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                                                <option value="Inactive" <?= $row['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="type" class="form-label">Tipe</label>
                                            <select class="form-select" name="type" required>
                                                <option value="Umrah" <?= $row['type'] == 'Umrah' ? 'selected' : '' ?>>Umrah</option>
                                                <option value="Haji" <?= $row['type'] == 'Haji' ? 'selected' : '' ?>>Haji</option>
                                                <option value="Travel" <?= $row['type'] == 'Travel' ? 'selected' : '' ?>>Travel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mb-4">
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <a href="dash_kontak.php" class="btn btn-danger">Kontak</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
