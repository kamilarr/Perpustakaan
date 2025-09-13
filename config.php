<?php
define('DB_HOST','127.0.0.1');
define('DB_USER','user');
define('DB_PASS','user123');

$conn_buku = mysqli_connect(DB_HOST, DB_USER, DB_PASS, 'db_buku');
$conn_peminjaman = mysqli_connect(DB_HOST, DB_USER, DB_PASS, 'db_peminjaman');

if (!$conn_buku || !$conn_peminjaman) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
