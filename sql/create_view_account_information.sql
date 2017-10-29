CREATE VIEW AccountInformation AS
SELECT acct.id AS account_id, acct.first_name, acct.last_name, acct.email, acct.is_owner, acct.is_producer, addr.id AS address_id, FullAddress(addr.id) as address, addr.street, addr.city, addr.state, addr.zip
FROM Accounts acct
INNER JOIN Addresses addr
ON acct.address_id = addr.id
