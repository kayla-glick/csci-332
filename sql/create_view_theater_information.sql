CREATE VIEW TheaterInformation AS
SELECT thets.id AS theater_id, thets.number, thets.capacity, cins.id AS cinema_id, ( SELECT COUNT(id) FROM Showings WHERE theater_id = thets.id ) as showing_count
from Theaters thets
INNER JOIN Cinemas cins ON thets.cinema_id = cins.id
ORDER BY thets.number
