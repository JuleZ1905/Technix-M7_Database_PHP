DROP DATABASE IF EXISTS tournament;

CREATE DATABASE IF NOT EXISTS tournament DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE tournament;

DROP TABLE IF EXISTS player;
CREATE TABLE player
(
    pk_player_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    first_name   VARCHAR(50) NOT NULL,
    last_name    VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS gameround;
CREATE TABLE gameround
(
    pk_round_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `date`      DATE            NOT NULL,
    `time`      TIME            NOT NULL,
    fk_p1       INT             NOT NULL,
    fk_p2       INT             NOT NULL,
    symbol_p1   VARCHAR(15)     NOT NULL,
    symbol_p2   VARCHAR(15)     NOT NULL,
    CONSTRAINT fk_gameround_p1 FOREIGN KEY (fk_p1) REFERENCES player (pk_player_id),
    CONSTRAINT fk_gameround_p2 FOREIGN KEY (fk_p2) REFERENCES player (pk_player_id)
);

INSERT INTO player (first_name, last_name)
VALUES ('Julian', 'Zangl'),
       ('Katharina', 'Jaros'),
       ('Corvin', 'Prath'),
       ('Bernhard', 'Myska');

INSERT INTO gameround (`date`, `time`, fk_p1, fk_p2, symbol_p1, symbol_p2)
VALUES ('2022-01-01', '11:05:00', 1, 2, 'rock', 'paper'),
       ('2022-01-01', '12:20:00', 3, 4, 'scissors', 'rock'),
       ('2022-01-01', '13:35:00', 2, 4, 'paper', 'scissors'),
       ('2022-01-01', '14:20:00', 1, 3, 'paper', 'rock'),
       ('2022-01-01', '15:40:00', 4, 1, 'rock', 'rock');

SELECT * FROM gameround;