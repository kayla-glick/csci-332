CREATE VIEW ShowingInformation AS
SELECT shows.id AS showing_id, shows.show_date, shows.show_time, shows.price, movs.id AS movie_id, movs.title AS movie, movs.rating, movs.run_time, cins.id AS cinema_id, thets.id AS theater_id, thets.number AS theater_number, thets.capacity, (SELECT COUNT(*) FROM Tickets ticks INNER JOIN Transactions trans ON ticks.transaction_id=trans.id WHERE trans.showing_id=shows.id) AS ticket_count
FROM Showings shows
INNER JOIN Movies movs ON shows.movie_id = movs.id
INNER JOIN Theaters thets ON shows.theater_id = thets.id
INNER JOIN Cinemas cins ON thets.cinema_id = cins.id
ORDER BY movs.title, shows.show_date, shows.show_time
