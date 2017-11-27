CREATE VIEW ShowingsReport AS
SELECT thets.id AS theater_id, thets.number AS theater_number, thets.capacity, shows.show_date, shows.show_time, shows.price, movs.title AS movie, AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)) AS end_time, (SELECT COUNT(*) FROM Tickets ticks INNER JOIN Transactions trans ON ticks.transaction_id=trans.id WHERE trans.showing_id=shows.id) AS ticket_count
From Theaters thets
LEFT OUTER JOIN Showings shows ON shows.theater_id=thets.id
INNER JOIN Movies movs ON shows.movie_id=movs.id
