<?php

namespace Julian\M7PhpDatabase;

use Doctrine\ORM\Mapping\Id;

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

    public static function createPlayer($id, $symbol)
    {
        require('db/db.php');
        $querybuilder = $conn->createQueryBuilder();
        $querybuilder->select('*')
            ->from('player')
            ->where('pk_player_id = :id')
            ->setParameter('id', $id);
        $statement = $querybuilder->execute();
        $row = $statement->fetch();
        return new Player($row['pk_player_id'], $row['first_name'], $row['last_name'], $symbol);
    }

    public static function getAllPlayerNames()
    {
        require('db/db.php');
        $querybuilder = $conn->createQueryBuilder();
        $querybuilder->select('*')
            ->from('player');
        $statement = $querybuilder->execute();
        while ($row = $statement->fetch()) {
            $playerNames[] = array(
                'id' => $row['pk_player_id'],
                'firstname' => $row['first_name'],
                'lastname' => $row['last_name'],
            );
        }
        return $playerNames;
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
