USE test;
CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    birthday DATE
);

INSERT INTO users
(first_name, last_name, birthday)
VALUES
('Test', 'Tester', '2020-01-01');
    
