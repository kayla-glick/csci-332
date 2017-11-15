CREATE TABLE Transactions (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  account_id INT NOT NULL REFERENCES Accounts(id),
  showing_id INT NOT NULL REFERENCES Showings(id),
  amount INT NOT NULL,
  date TIMESTAMP NOT NULL
);
