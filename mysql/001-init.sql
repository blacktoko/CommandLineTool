CREATE DATABASE test;

CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    BirthDay DATE
);

INSERT INTO users
    (FirstName, LastName, BirtDay)
    VALUES
    'Test', 'Tester', '2020-01-01';
    
