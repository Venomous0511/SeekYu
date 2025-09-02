-- ==========================
-- GUARDS (Security guard details linked to users)
-- ==========================
CREATE TABLE guards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    deployment_id INT DEFAULT NULL,
    status ENUM('active', 'inactive', 'on_leave') DEFAULT 'active',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);