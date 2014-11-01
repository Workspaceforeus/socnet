CREATE TABLE albums (
    album_id INT AUTO_INCREMENT PRIMARY KEY,
    id INT,
    FOREIGN KEY (id) REFERENCES users(id),
    album_name VARCHAR(100)
);