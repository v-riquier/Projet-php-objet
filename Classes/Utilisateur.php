<?php
class User{
    private $ID;
    private $NOM;
    public function __construct($DI,$MON)
    {
        $ID=$DI;
        $NOM=$MON;
        $_SESSION["IDUser"]=$ID;
        $_SESSION["NomUser"]=$NOM;
    }
    public function getnom(){
        return $this->NOM;
    }
    public function getID(){
        return $this->ID;
    }
}