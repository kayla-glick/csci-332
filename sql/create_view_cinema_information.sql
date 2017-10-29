CREATE VIEW CinemaInformation AS
SELECT cins.id AS cinema_id, cins.name, FullAddress(adds.id) AS address, cins.owner_id AS account_id, accs.first_name, accs.last_name, accs.email, ( SELECT COUNT(id) from Theaters where cinema_id = cins.id ) as theater_count
FROM Cinemas cins
INNER JOIN Addresses adds
ON adds.id = cins.address_id
INNER JOIN Accounts accs
ON accs.id = cins.owner_id
