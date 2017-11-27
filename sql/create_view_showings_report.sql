CREATE VIEW ShowingsReport AS
SELECT cins.id AS cinema_id, thets.number AS theater_number, thets.capacity, shows.show_date, shows.show_time, shows.price, movs.title AS movie, AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)) AS end_time, (SELECT COUNT(*) FROM Tickets ticks WHERE ticks.transaction_id=trans.id) AS ticket_count
FROM Cinemas cins
LEFT OUTER JOIN Theaters thets ON cins.id=thets.cinema_id
LEFT OUTER JOIN Showings shows ON thets.id=shows.theater_id
LEFT OUTER JOIN Movies movs ON shows.movie_id=movs.id
LEFT OUTER JOIN Transactions trans ON shows.id=trans.showing_id
