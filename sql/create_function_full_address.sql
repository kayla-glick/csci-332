CREATE FUNCTION FullAddress ( address_id INT )
RETURNS VARCHAR(522)
BEGIN
DECLARE address VARCHAR(522);
SET address = ( SELECT CONCAT(street, ', ', city, ', ', state, ' ', zip) FROM Addresses WHERE id = address_id );
RETURN address;
END
