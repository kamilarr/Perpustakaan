-- 1. Ubah struktur kolom
ALTER TABLE books 
DROP COLUMN status,
ADD COLUMN stok INT DEFAULT 0;

-- 2. Isi stok dummy
UPDATE books SET stok = 5;
