<?php

namespace Julian\M7PhpDatabase;

class Gameround
{
    protected $player1;
    protected $player2;
    protected $winner;
    protected $date;
    protected $time;
    protected $id;

    public function __construct($player1, $player2, $winner, $date, $time, $id)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->winner = $winner;
        $this->date = $date;
        $this->time = $time;
        $this->id = $id;
    }

    public static function deleteGameround($id)
    {
        require('db/db.php');
        $querybuilder = $conn->createQueryBuilder();
        $querybuilder->delete('gameround')
            ->where('pk_round_id = :id')
            ->setParameter('id', $id);
        $querybuilder->execute();
    }

    /**
     * Get the value of player1
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * Get the value of player2
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * Get the value of winner
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the value of time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
