-- Buat database
CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

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

-- Tabel buku
CREATE TABLE books (
    buku_id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    kategori VARCHAR(50),
    status ENUM('tersedia','dipinjam') DEFAULT 'tersedia'
);

-- Insert dummy buku
INSERT INTO books (judul, penulis, kategori, status) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Novel', 'tersedia'),
('Algoritma dan Pemrograman', 'Rinaldi Munir', 'Pendidikan', 'tersedia'),
('Harry Potter and the Sorcerer''s Stone', 'J.K. Rowling', 'Fantasy', 'dipinjam'),
('Filosofi Teras', 'Henry Manampiring', 'Self Development', 'tersedia'),
('Clean Code', 'Robert C. Martin', 'Pendidikan', 'tersedia');

-- Tabel peminjaman
CREATE TABLE peminjaman (
    peminjaman_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    buku_id INT,
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE,
    status ENUM('dipinjam','kembali') DEFAULT 'dipinjam',
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (buku_id) REFERENCES books(buku_id)
);

-- Insert dummy peminjaman (contoh Harry Potter sedang dipinjam)
INSERT INTO peminjaman (user_id, buku_id, tanggal_pinjam, tanggal_kembali, status) VALUES
(1, 3, '2025-09-10', '2025-09-17', 'dipinjam');
