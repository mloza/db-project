-- Triger dodający nieistniejącą parę (sezon, nazwaZawodow) gdy dodajemy wyniki nowych zawodów.
DELIMITER //
CREATE TRIGGER makeSezon BEFORE INSERT ON wynik FOR EACH ROW
BEGIN
    IF (new.sezon, new.nazwaZawodow) NOT IN (SELECT DISTINCT sezon, nazwaZawodow FROM sezon) THEN
        INSERT INTO sezon VALUES(new.sezon, new.nazwaZawodow);
    END IF;
END;//
DELIMITER ;
