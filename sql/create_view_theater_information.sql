CREATE VIEW TheaterInformation AS
SELECT thets.id AS theater_id, thets.number, thets.capacity, cins.id AS cinema_id, cins.name AS cinema_name
from Theaters thets
INNER JOIN Cinemas cins ON thets.cinema_id = cins.id
