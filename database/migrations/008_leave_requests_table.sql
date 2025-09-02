-- ==========================
-- LEAVE REQUESTS
-- ==========================
CREATE TABLE leave_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guard_id INT NOT NULL,
    date_from DATE NOT NULL,
    date_to DATE NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (guard_id) REFERENCES guards(id) ON DELETE CASCADE
);