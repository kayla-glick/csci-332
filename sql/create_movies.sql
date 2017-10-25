CREATE TABLE Movies (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  producer VARCHAR(255) NOT NULL,
  release_date TIMESTAMP NOT NULL,
  run_time INT NOT NULL,
  rating_id INT NOT NULL
);
