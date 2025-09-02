-- ==========================
-- KPI (Performance evaluations for guards)
-- ==========================
CREATE TABLE kpi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guard_id INT NOT NULL,
    evaluator_id INT NOT NULL,
    score DECIMAL(5,2) NOT NULL,
    criteria VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (guard_id) REFERENCES guards(id) ON DELETE CASCADE,
    FOREIGN KEY (evaluator_id) REFERENCES users(id) ON DELETE CASCADE
);