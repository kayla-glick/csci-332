CREATE VIEW ShowingsReport AS
SELECT cins.id AS cinema_id, thets.number AS theater_number, thets.capacity, shows.show_date, shows.show_time, shows.price, movs.title AS movie, AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)) AS end_time, COUNT(ticks.id) AS ticket_count
FROM Cinemas cins
INNER JOIN Theaters thets ON cins.id=thets.cinema_id
INNER JOIN Showings shows ON thets.id=shows.theater_id
INNER JOIN Movies movs ON shows.movie_id=movs.id
INNER JOIN Transactions trans ON shows.id=trans.showing_id
INNER JOIN Tickets ticks on trans.id=ticks.transaction_id
