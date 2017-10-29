CREATE FUNCTION FullAddress ( address_id INT )
RETURNS VARCHAR(524)
BEGIN
DECLARE address VARCHAR(524);
SET address = ( SELECT CONCAT(street, '<br>', city, ', ', state, ' ', zip) FROM Addresses WHERE id = address_id );
RETURN address;
END
