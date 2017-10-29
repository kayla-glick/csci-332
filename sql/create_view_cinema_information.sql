CREATE VIEW CinemaInformation AS
SELECT cins.id AS cinema_id, cins.name, FullAddress(adds.id) AS address, accs.id AS account_id, accs.first_name, accs.last_name, accs.email
FROM Cinemas cins
INNER JOIN Addresses adds
ON adds.id = cins.address_id
INNER JOIN Accounts accs
ON accs.id = cins.owner_id
