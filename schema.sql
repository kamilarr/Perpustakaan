-- Buat database
CREATE DATABASE IF NOT EXISTS db_buku;
USE db_buku;

-- Tabel buku
CREATE TABLE books (
    buku_id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    kategori VARCHAR(50),
    stok INT DEFAULT 1
);

-- Insert dummy buku
INSERT INTO books (judul, penulis, kategori, stok) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Novel', '5'),
('Algoritma dan Pemrograman', 'Rinaldi Munir', 'Pendidikan', '5'),
('Harry Potter and the Sorcerer''s Stone', 'J.K. Rowling', 'Fantasy', '5'),
('Filosofi Teras', 'Henry Manampiring', 'Self Development', '5'),
('Clean Code', 'Robert C. Martin', 'Pendidikan', '5');