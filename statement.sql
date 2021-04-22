CREATE DATABASE moneyz;
USE moneyz;

CREATE TABLE tblUser(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Created_at DATETIME NOT NULL,
    Updated_at DATETIME NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE tblMoneyz(
    moneyz_id INT NOT NULL AUTO_INCREMENT,
    moneyz INT NOT NULL,
    user_id INT,
    PRIMARY KEY (moneyz_id),
    FOREIGN KEY (user_id) REFERENCES tblUser(user_id)


);