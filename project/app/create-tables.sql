-- Vytvoření databáze
CREATE DATABASE IF NOT EXISTS music;

-- Použití vytvořené databáze
USE music;

-- Vytvoření tabulky typ_zanr
CREATE TABLE IF NOT EXISTS typ_zanr (
                                        id_typ_zanr INT PRIMARY KEY,
                                        nazev VARCHAR(50) NOT NULL
    );

-- Vytvoření tabulky typ_narodnost
CREATE TABLE IF NOT EXISTS typ_narodnost (
                                             id_typ_narodnost INT PRIMARY KEY,
                                             nazev VARCHAR(50) NOT NULL
    );

-- Vytvoření tabulky interpret
CREATE TABLE IF NOT EXISTS interpret (
                                         id_interpret INT PRIMARY KEY,
                                         nazev VARCHAR(50) NOT NULL,
    id_typ_narodnost INT,
    FOREIGN KEY (id_typ_narodnost) REFERENCES typ_narodnost(id_typ_narodnost)
    );

-- Vytvoření tabulky album
CREATE TABLE IF NOT EXISTS album (
                                     id_album INT PRIMARY KEY,
                                     id_typ_zanr INT,
                                     nazev VARCHAR(50) NOT NULL,
    datum_vydani DATE,
    FOREIGN KEY (id_typ_zanr) REFERENCES typ_zanr(id_typ_zanr)
    );

-- Vytvoření tabulky skladba
CREATE TABLE IF NOT EXISTS skladba (
                                       id_skladba INT PRIMARY KEY,
                                       nazev VARCHAR(50) NOT NULL,
    delka INT
    );

-- Vytvoření spojovací tabulky album_interpret
CREATE TABLE IF NOT EXISTS album_interpret (
                                               id_album_interpret INT PRIMARY KEY,
                                               id_album INT,
                                               id_interpret INT,
                                               FOREIGN KEY (id_album) REFERENCES album(id_album),
    FOREIGN KEY (id_interpret) REFERENCES interpret(id_interpret)
    );

-- Vytvoření spojovací tabulky album_skladba
CREATE TABLE IF NOT EXISTS album_skladba (
                                             id_album_skladba INT PRIMARY KEY,
                                             cislo_stopy INT,
                                             id_album INT,
                                             id_skladba INT,
                                             FOREIGN KEY (id_album) REFERENCES album(id_album),
    FOREIGN KEY (id_skladba) REFERENCES skladba(id_skladba)
    );

-- Vložení testovacích dat
INSERT INTO typ_zanr VALUES (1, 'Rock'), (2, 'Pop'), (3, 'R&B');
INSERT INTO typ_narodnost VALUES (1, 'USA'), (2, 'UK'), (3, 'Czech Republic');
INSERT INTO interpret VALUES (1, 'The Beatles', 2), (2, 'Queen', 2), (3, 'Karel Gott', 3);
INSERT INTO album VALUES (1, 1, 'Abbey Road', '1969-09-26'), (2, 2, 'A Night at the Opera', '1975-11-21'), (3, 3, 'Karel Gott - Největší hity', '2000-01-01');
INSERT INTO skladba VALUES (1, 'Bohemian Rhapsody', 355), (2, 'Hey Jude', 431), (3, 'Vcelka Maja', 180);
INSERT INTO album_interpret VALUES (1, 1, 1), (2, 2, 2), (3, 3, 3);
INSERT INTO album_skladba VALUES (1, 1, 1, 1), (2, 2, 1, 2), (3, 3, 3, 3);

