CREATE VIEW ShowingInformation AS
SELECT shows.id AS showing_id, shows.show_time, shows.price, movs.title AS movie, movs.run_time, cins.id AS cinema_id
FROM Showings shows
INNER JOIN Movies movs ON shows.movie_id = movs.id
INNER JOIN Theaters thets on shows.theater_id = thets.id
INNER JOIN Cinemas cins on thets.cinema_id = cins.id
