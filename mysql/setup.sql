CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE contacts(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255),
    phone_nober VARCHAR(255)
);

INSERT INTO contacts (name , phone_nober) VALUE ("pepe" , "12457896");
