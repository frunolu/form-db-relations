CREATE VIEW AlbumInterpretView AS
SELECT a.id_album, i.nazev AS interpret
FROM album a
         JOIN album_interpret ai ON a.id_album = ai.id_album
         JOIN interpret i ON ai.id_interpret = i.id_interpret;

CREATE VIEW AlbumTrackView AS
SELECT a.id_album, COUNT(ast.id_skladba) AS track_count
FROM album a
         LEFT JOIN album_skladba ast ON a.id_album = ast.id_album
GROUP BY a.id_album;

SELECT aiw.interpret, a.nazev AS album, atv.track_count
FROM AlbumInterpretView aiw
         JOIN AlbumTrackView atv ON aiw.id_album = atv.id_album
ORDER BY aiw.interpret, a.nazev;
