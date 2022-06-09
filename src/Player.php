<?php

namespace Julian\M7PhpDatabase;

class Player
{
    protected $firstname;
    protected $lastname;
    protected $playerId;
    protected $playerSymbol;


    public function __construct($firstname, $playerId, $playerSymbol, $lastname)
    {
        $this->firstname = $firstname;
        $this->playerId = $playerId;
        $this->playerSymbol = $playerSymbol;
        $this->lastname = $lastname;
    }


    public function getPlayerName()
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
