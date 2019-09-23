CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    synopsis TEXT,
    poster VARCHAR(255),
    trailer VARCHAR(255),
    director VARCHAR(255),
    genre VARCHAR(255),
    rating DECIMAL(1,1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
