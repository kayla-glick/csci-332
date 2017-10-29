CREATE TABLE Movies (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  genre VARCHAR(255) NOT NULL,
  rating VARCHAR(5) NOT NULL,
  producer_id INT references Accounts(id),
  run_time INT NOT NULL,
  release_date TIMESTAMP NOT NULL
);
