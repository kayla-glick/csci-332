CREATE TABLE Cinemas (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  address_id INT NOT NULL REFERENCES Addresses(id),
  owner_id INT NOT NULL REFERENCES Accounts(id)
);
