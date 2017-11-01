CREATE VIEW CinemaInformation AS
SELECT cins.id AS cinema_id, cins.name, FullAddress(adds.id) AS address, adds.id as address_id, adds.street, adds.city, adds.state, adds.zip, cins.owner_id, accs.first_name, accs.last_name, accs.email, ( SELECT COUNT(id) from Theaters where cinema_id = cins.id ) as theater_count
FROM Cinemas cins
INNER JOIN Addresses adds
ON adds.id = cins.address_id
INNER JOIN Accounts accs
ON accs.id = cins.owner_id
