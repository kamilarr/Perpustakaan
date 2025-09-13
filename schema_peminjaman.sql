-- Buat database
CREATE DATABASE IF NOT EXISTS db_peminjaman;
USE db_peminjaman;

-- Tabel user
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert dummy user (Password sudah di-hash menggunakan bcrypt)
INSERT INTO users (username, password) VALUES
('user', '$2y$10$YeuC4IAk8AYR2FmLxM7eJe0lUigDsqXXCEz9J7a/2qp.r6EHeHcoa'), -- password: user123
('admin', '$2y$10$NSqWIbGwWpCrWnj2ElQzwuMuC168PkHIXUejHtZw.ZFV7tIPERyj.'); -- password: admin123

-- Tabel peminjaman
CREATE TABLE peminjaman (
    peminjaman_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    buku_id INT, -- tidak pakai FOREIGN KEY ke db_buku
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE,
    status ENUM('dipinjam','kembali') DEFAULT 'dipinjam',
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Insert dummy peminjaman (contoh Harry Potter sedang dipinjam)
INSERT INTO peminjaman (user_id, buku_id, tanggal_pinjam, tanggal_kembali, status) VALUES
(1, 3, '2025-09-10', '2025-09-17', 'dipinjam');
