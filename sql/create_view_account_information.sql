CREATE VIEW AccountInformation AS
SELECT acct.id as account_id, acct.first_name, acct.last_name, acct.email, acct.is_owner, acct.is_producer, addr.id as address_id, addr.street, addr.city, addr.state, addr.zip
from Accounts acct
INNER JOIN Addresses addr
on acct.address_id = addr.id
