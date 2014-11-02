CREATE TABLE comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    id INT,
    FOREIGN KEY (id) REFERENCES users(id),
    Friend_Id INT,
    body VARCHAR(100),
    image VARCHAR(100),
	dt VARCHAR(100)
);