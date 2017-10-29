CREATE VIEW CinemaInformation AS
SELECT cins.id AS cinema_id, cins.name, FullAddress(adds.id) AS address, accs.first_name, accs.last_name, accs.email
from Cinemas cins
INNER JOIN Addresses adds
ON adds.id = cins.address_id
INNER JOIN Accounts accs
ON accs.id = cins.owner_id
