<?php

namespace Julian\M7PhpDatabase;

class Tournament
{
    protected $gamerounds;

    public function __construct()
    {
        $this->gamerounds = $this->retrieveGamerounds();
    }

    public function retrieveGamerounds()
    {
        require('db/db.php');
        $querybuilder = $conn->createQueryBuilder();
        $querybuilder->select('*')
            ->from('gameround');
        $statement = $querybuilder->execute();
        while ($row = $statement->fetch()) {
            $player1 = Player::createPlayer($row['fk_p1'], $row['symbol_p1']);
            $player2 = Player::createPlayer($row['fk_p2'], $row['symbol_p2']);

            $this->gamerounds[] = new Gameround($player1, $player2, $this->declareOutcome($player1, $player2), $row['date'], $row['time'], $row['pk_round_id']);
        }
        return $this->gamerounds;
    }

    public function declareOutcome($p1, $p2)
    {
        $player1_symbol = $p1->getPlayerSymbol();
        $player2_symbol = $p2->getPlayerSymbol();

        if ($player1_symbol == $player2_symbol) return "draw";
        if (($player1_symbol == 'scissors' && $player2_symbol == 'paper') || ($player1_symbol == 'paper' && $player2_symbol == 'rock') || ($player1_symbol == 'rock' && $player2_symbol == 'scissors')) return $p1->getFirstname() . " " . $p1->getLastname() . " wins";
        return $p2->getFirstname() . " " . $p2->getLastname() . " wins";
    }



    /**
     * Get the value of gamerounds
     */ 
    public function getGamerounds()
    {
        return $this->gamerounds;
    }
}
