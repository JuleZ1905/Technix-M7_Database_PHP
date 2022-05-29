DROP DATABASE IF EXISTS tournament;

CREATE DATABASE IF NOT EXISTS tournament DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE tournament;

DROP TABLE IF EXISTS player;
CREATE TABLE player (
    pk_player_id INTEGER PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS gameround;
CREATE TABLE gameround (
    pk_round_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    fk_p1 INT NOT NULL,
    fk_p2 INT NOT NULL,
    symbol_p1 VARCHAR(15) NOT NULL,
    symbol_p2 VARCHAR(15) NOT NULL,
    CONSTRAINT fk_gameround_p1 FOREIGN KEY (fk_p1) REFERENCES player(pk_player_id),
    CONSTRAINT fk_gameround_p2 FOREIGN KEY (fk_p2) REFERENCES player(pk_player_id)
);