CREATE VIEW MovieInformation AS
SELECT movs.id AS movie_id, movs.title, movs.description, movs.genre, movs.rating, movs.release_date, movs.run_time, accs.id AS account_id, accs.first_name, accs.last_name, accs.email
FROM Movies movs
INNER JOIN Accounts accs
ON accs.id = movs.producer_id
