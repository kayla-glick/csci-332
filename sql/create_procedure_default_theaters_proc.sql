CREATE PROCEDURE DefaultTheatersProc ( cinema INT, count INT, default_capacity INT )
BEGIN
DECLARE i INT;
SET i = count;
WHILE i < count DO
INSERT INTO Theaters (number, capacity, cinema_id) VALUES (i + 1, default_capacity, cinema);
SET i = i + 1;
END WHILE;
END
