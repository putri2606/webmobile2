<?php
// Mulai session
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login
header("Location: admin_login.php");
exit;
?>
