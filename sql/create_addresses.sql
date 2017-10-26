CREATE TABLE Addresses (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  state CHAR(2) NOT NULL,
  city VARCHAR(255) NOT NULL,
  street VARCHAR(255) NOT NULL,
  zip CHAR(5) NOT NULL,
  UNIQUE KEY full_address (state, city, street, zip)
);
