-- ==========================
-- APPLICATIONS (Applicants: Guard or Client)
-- ==========================
CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_id INT NOT NULL,
    type ENUM('guard', 'client') NOT NULL,
    status ENUM('under_review', 'interview', 'accepted', 'rejected') DEFAULT 'under_review',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (applicant_id) REFERENCES users(id) ON DELETE CASCADE
);