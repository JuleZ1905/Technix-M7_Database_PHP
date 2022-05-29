DROP
DATABASE IF EXISTS Tournament;

CREATE
DATABASE IF NOT EXISTS Tournament
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;


CREATE TABLE gameround
(
    pk_gameraoundId INTEGER PRIMARY KEY,
    round           VARCHAR(50) NOT NULL,
    date            DATE,
    time            TIME,

    fk_pk_symbolID  VARCHAR     NOT NULL,
    CONSTRAINT fk_symbol_round FOREIGN KEY (fk_pk_symbolID) REFERENCES player (pk_playerId)
        ON DELETE CASCADE
);


CREATE TABLE player
(
    pk_playerId INTEGER PRIMARY KEY,
    name        VARCHAR(50) NOT NULL,
    lastname    VARCHAR(50),


);

CREATE TABLE round_player
(
    pk_fk_gameraoundId INTEGER  NOT NULL,
    pk_fk_playerId      INTEGER NOT NULL,

    PRIMARY KEY (pk_fk_gameraoundId, pk_fk_playerId),

    CONSTRAINT fk_round_player FOREIGN KEY (pk_fk_playerId)
        REFERENCES pilot (pk_fk_id),
    CONSTRAINT fk_player_round FOREIGN KEY (pk_fk_playerId)
        REFERENCES flug (pk_id)

)


CREATE TABLE symbol
(
    pk_symbolID VARCHAR PRIMARY KEY,
);