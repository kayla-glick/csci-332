CREATE TABLE Reviews (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  account_id INT REFERENCES Accounts(id),
  rating TINYINT NOT NULL,
  review TEXT
);
