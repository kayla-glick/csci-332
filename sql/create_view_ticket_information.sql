CREATE VIEW TicketInformation AS
SELECT ticks.id AS ticket_id, tracs.account_id, tracs.date, shows.show_time, shows.price, thetrs.number as theater_number, cins.name as cinema_name, FullAddress(adds.id) AS address, movs.title AS movie_title, movs.genre, movs.rating, movs.run_time
FROM Tickets ticks
INNER JOIN Transactions tracs
ON ticks.transaction_id = tracs.id
INNER JOIN Showings shows
ON tracs.showing_id = shows.id
INNER JOIN Theaters thetrs
ON shows.theater_id = thetrs.id
INNER JOIN Cinemas cins
ON thetrs.cinema_id = cins.id
INNER JOIN Addresses adds
ON cins.address_id = adds.id
INNER JOIN Movies movs
ON shows.movie_id = movs.id
