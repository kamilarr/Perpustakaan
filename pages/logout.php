<?php
// Mulai session
session_start();

// Hapus semua session
session_unset();
session_destroy();

// Redirect ke halaman utama setelah logout
header("Location: /pages/index.php");
exit;
?>
