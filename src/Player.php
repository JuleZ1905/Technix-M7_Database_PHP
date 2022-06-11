<?php

namespace Julian\M7PhpDatabase;

class Player
{
    protected $firstname;
    protected $lastname;
    protected $playerId;
    protected $playerSymbol;


    public function __construct($playerId, $firstname, $lastname, $playerSymbol)
    {
        $this->firstname = $firstname;
        $this->playerId = $playerId;
        $this->playerSymbol = $playerSymbol;
        $this->lastname = $lastname;
    }

    public static function createPlayer($id, $symbol) {
        require('db/db.php');
        $querybuilder = $conn->createQueryBuilder();
        $querybuilder->select('*')
            ->from('player')
            ->where('pk_player_id = :id')
            ->setParameter('id', $id);
        $statement = $querybuilder->execute();
        $row = $statement->fetch();
        $player = new Player($row['pk_player_id'], $row['first_name'], $row['last_name'], $symbol);
        return $player;
    } 

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getPlayerId()
    {
        return $this->playerId;
    }

    public function getPlayerSymbol()
    {
        return $this->playerSymbol;
    }
}
