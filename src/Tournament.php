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
        require_once('db/db.php');
        $querybuilder = $conn->createQueryBuilder();

        $querybuilder->select('*')
            ->from('gameround');

        $gamerounds = $querybuilder->execute()->fetchAll();
        return $gamerounds;

        // $statement = $querybuilder->executeQuery();
        // while ($row = $statement->fetch()) {
        //     $gameround = new GameRound($row['player1'], $row['player2'], $row['winner'], $row['date'], $row['time']);
        //     $this->gamerounds = $gameround;
        // }
    }
}
