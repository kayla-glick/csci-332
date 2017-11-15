CREATE TRIGGER CreateTicketsTrig
AFTER INSERT ON Transactions
FOR EACH ROW
BEGIN
DECLARE i INTEGER;
SET i = 0;
WHILE i < NEW.ticket_count DO
INSERT INTO Tickets (transaction_id) VALUES (NEW.id);
SET i = i + 1;
END WHILE;
END
