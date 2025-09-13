ALTER TABLE users ADD role ENUM('user','admin') DEFAULT 'user';

-- 2
UPDATE users SET role = 'admin' WHERE username = 'admin';
UPDATE users SET role = 'user' WHERE username = 'user';
