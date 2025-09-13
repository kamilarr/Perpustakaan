-- Buat database
CREATE DATABASE IF NOT EXISTS db_buku;
USE db_buku;

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