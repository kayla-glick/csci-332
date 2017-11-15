CREATE TRIGGER CreateTicketsTrig
AFTER INSERT ON Transactions
FOR EACH ROW
BEGIN
DECLARE i INTEGER;
SET i = 0;
WHILE i < new_row.ticket_count DO
INSERT INTO Tickets (tranaction_id) VALUES (new_row.id);
SET i = i + 1;
END WHILE;
END
