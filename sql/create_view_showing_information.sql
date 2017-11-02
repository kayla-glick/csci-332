CREATE VIEW ShowingInformation shows AS
SELECT shows.id AS showing_id, shows.show_time, shows.price, movs.name AS movie_name, movs.run_time, cins.id AS cinema_id
INNER JOIN Movies movs ON shows.movie_id = movs.id
INNER JOIN Theaters thets on shows.theater_id = thets.id
INNER JOIN Cinemas cins on thets.cinema_id = cins.id
