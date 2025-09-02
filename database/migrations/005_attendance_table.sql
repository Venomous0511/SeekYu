-- ==========================
-- ATTENDANCE (Daily records of guards)
-- ==========================
CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guard_id INT NOT NULL,
    date DATE NOT NULL,
    time_in TIME,
    time_out TIME,
    status ENUM('present', 'late', 'absent', 'on_leave') DEFAULT 'present',
    FOREIGN KEY (guard_id) REFERENCES guards(id) ON DELETE CASCADE
);