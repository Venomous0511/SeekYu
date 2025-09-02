-- ==========================
-- SCHEDULES (Shift schedules for guards)
-- ==========================
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guard_id INT NOT NULL,
    shift_start DATETIME NOT NULL,
    shift_end DATETIME NOT NULL,
    FOREIGN KEY (guard_id) REFERENCES guards(id) ON DELETE CASCADE
);