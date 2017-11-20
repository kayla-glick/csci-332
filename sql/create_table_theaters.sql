CREATE TABLE Theaters (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  number INT NOT NULL,
  capacity INT NOT NULL,
  cinema_id INT NOT NULL,
  UNIQUE KEY (number, cinema_id),
  FOREIGN KEY (cinema_id) REFERENCES Cinemas(id) ON DELETE CASCADE
);
