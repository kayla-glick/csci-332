CREATE TABLE Theaters (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  number INT NOT NULL,
  capacity INT NOT NULL,
  cinema_id INT NOT NULL REFERENCES Cinemas(id),
  UNIQUE KEY (number, cinema_id)
);
