CREATE VIEW MovieInformation AS
SELECT DISTINCT movs.id AS movie_id, movs.title, movs.description, movs.genre, movs.rating, movs.release_date, movs.run_time, movs.producer_id, CONCAT(accs.first_name, ' ', accs.last_name) AS producer
FROM Movies movs
INNER JOIN Accounts accs
ON accs.id = movs.producer_id
INNER JOIN Showings shows
ON shows.movie_id = movs.id
