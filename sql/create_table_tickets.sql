CREATE TABLE Tickets (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  transaction_id INT NOT NULL REFERENCES Accounts(id),
  showing_id INT NOT NULL REFERENCES Showings(id)
);
