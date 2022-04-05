CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE contacts(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255),
    phone_nober VARCHAR(255)
);

INSERT INTO users (name , email , password) VALUE ("pepe" , "kclavasquinwk@gmail.com" , "wwkc0205");


INSERT INTO contacts (name , phone_nober) VALUE ("pepe" , "12457896");
