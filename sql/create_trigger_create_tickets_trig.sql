CREATE TRIGGER CreateTicketsTrig
AFTER INSERT ON Transactions
FOR EACH ROW
BEGIN
INSERT INTO Tickets (tranaction_id) VALUES (new_row.id);
END
