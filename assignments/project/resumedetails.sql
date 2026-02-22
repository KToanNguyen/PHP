CREATE TABLE resumedetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name  VARCHAR(100) NOT NULL,
    pos   VARCHAR(500),
    skills     TEXT,
    email      VARCHAR(150) UNIQUE,
    num      VARCHAR(20),
    sum    TEXT
); 
-- SQL code for "resumedetails"