<?php

namespace Julian\M7PhpDatabase;

class Tournament
{
    protected $gamerounds;

    public function __construct()
    {
        $this->gamerounds = [];
    }

    public function getGamerounds()
    {
        require('db/db.php');
        $querybuilder = $conn->createQueryBuilder();
        $querybuilder->select('*')
            ->from('gameround');
        $statement = $querybuilder->execute();
        $tournament = array();
        while ($row = $statement->fetch()) {
            $player1 = Player::createPlayer($row['fk_p1'], $row['symbol_p1']);
            $player2 = Player::createPlayer($row['fk_p2'], $row['symbol_p2']);

            $tournament[] = new Gameround($player1, $player2, $this->declareOutcome($player1, $player2), $row['date'], $row['time'], $row['pk_round_id']);
        }

        return $tournament;

        // $statement = $querybuilder->executeQuery();
        // while ($row = $statement->fetch()) {
        //     $gameround = new GameRound($row['player1'], $row['player2'], $row['winner'], $row['date'], $row['time']);
        //     $this->gamerounds = $gameround;
        // }
    }

    public function declareOutcome($p1, $p2)
    {
        $player1_symbol = $p1->getPlayerSymbol();
        $player2_symbol = $p2->getPlayerSymbol();

        if ($player1_symbol == $player2_symbol) return "draw";
        if (($player1_symbol == 'scissors' && $player2_symbol == 'paper') || ($player1_symbol == 'paper' && $player2_symbol == 'rock') || ($player1_symbol == 'rock' && $player2_symbol == 'scissors')) return $p1->getFirstname() . " " . $p1->getLastname() . " wins";
        return $p2->getFirstname() . " " . $p2->getLastname() . " wins";
    }
}
