CREATE TABLE Movies (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  genre VARCHAR(255) NOT NULL,
  rating VARCHAR(5) NOT NULL,
  producer_id INT NOT NULL,
  run_time INT NOT NULL,
  release_date DATE NOT NULL,
  FOREIGN KEY (producer_id) REFERENCES Accounts(id) ON DELETE CASCADE
);
