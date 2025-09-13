<?php
// Load konfigurasi database
require_once __DIR__ . '/../config.php';

// Koneksi ke database db_buku
$conn_buku = new mysqli(DB_HOST, DB_USER, DB_PASS, "db_buku");

// Cek error koneksi db_buku
if ($conn_buku->connect_error) {
    die("Koneksi ke db_buku gagal: " . $conn_buku->connect_error);
}

// Koneksi ke database db_peminjaman
$conn_peminjaman = new mysqli(DB_HOST, DB_USER, DB_PASS, "db_peminjaman");

// Cek error koneksi db_peminjaman
if ($conn_peminjaman->connect_error) {
    die("Koneksi ke db_peminjaman gagal: " . $conn_peminjaman->connect_error);
}
?>
