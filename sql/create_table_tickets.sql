CREATE TABLE Tickets (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  account_id INT NOT NULL REFERENCES Accounts(id),
  showing_id INT NOT NULL REFERENCES Showings(id),
  purchase_date TIMESTAMP NOT NULL
);