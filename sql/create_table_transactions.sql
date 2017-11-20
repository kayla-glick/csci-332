CREATE TABLE Transactions (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  account_id INT NOT NULL,
  showing_id INT NOT NULL,
  ticket_count INT NOT NULL,
  amount INT NOT NULL,
  date TIMESTAMP NOT NULL,
  FOREIGN KEY (account_id) REFERENCES Accounts(id) ON DELETE CASCADE,
  FOREIGN KEY (showing_id) REFERENCES Showings(id) ON DELETE CASCADE
);
