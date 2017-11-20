CREATE TRIGGER InsertShowingsTrig
BEFORE INSERT ON Showings
FOR EACH ROW
BEGIN
DECLARE overlapping INTEGER;
DECLARE run_time INTEGER;
DECLARE end_time TIME;
DECLARE release_date DATE;
SET run_time = ( SELECT run_time FROM Movies WHERE id=NEW.movie_id );
SET end_time = AddTime(NEW.show_time, SEC_TO_TIME(run_time * 60));
SET overlapping = ( 
    SELECT COUNT(*) FROM Showings shows
    INNER JOIN Movies movs ON movs.id=shows.movie_id
    WHERE shows.theater_id=NEW.theater_id AND shows.show_date=NEW.show_date
    AND (
        (NEW.show_time >= shows.show_time AND NEW.show_time <= AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)))
        OR
        (end_time >= shows.show_time AND end_time <= AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)))
    )
);
IF overlapping > 0 THEN
SIGNAL sqlstate '45001' SET message_text="There is already a showing in this theater at this time.";
END IF;

SET release_date = ( SELECT release_date from Movies where id=NEW.movie_id );
IF NEW.show_date < release_date THEN
SIGNAL sqlstate '45001' SET message_text="Showings may only occur after a movie is released.";
END IF;
END;;
