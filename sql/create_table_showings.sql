CREATE TABLE Showings (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  theater_id INT NOT NULL REFERENCES Theaters(id),
  movie_id INT NOT NULL REFERENCES Movies(id),
  show_date DATE NOT NULL,
  show_time TIME NOT NULL,
  price INT NOT NULL,
  UNIQUE KEY (theater_id, show_date, show_time)
);
