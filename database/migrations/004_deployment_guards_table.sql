-- ==========================
-- DEPLOYMENT (Which client a guard is assigned to)
-- ==========================
CREATE TABLE deployment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    guard_id INT NOT NULL,
    area VARCHAR(200) NOT NULL,
    shift VARCHAR(100),
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (guard_id) REFERENCES guards(id) ON DELETE CASCADE
);