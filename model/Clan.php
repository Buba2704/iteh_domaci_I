<?php

class Clan
{

    public $id;
    public $ime;
    public $prezime;
    public $datumRodjenja;
    public $adresa;
    public $brojTelefona;

    /**
     * @param $id
     * @param $ime
     * @param $prezime
     * @param $datumRodjenja
     * @param $adresa
     * @param $brojTelefona
     */
    public function __construct($id=null, $ime=null, $prezime=null, $datumRodjenja=null, $adresa=null, $brojTelefona=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->adresa = $adresa;
        $this->brojTelefona = $brojTelefona;
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO clanovi (ime,prezime,datumRodjenja,adresa,brojTelefona) 
                 VALUES ('$this->ime','$this->prezime','$this->datumRodjenja','$this->adresa','$this->brojTelefona');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE clanovi set ime = '$this->ime',prezime = '$this->prezime',
                   datumRodjenja = '$this->datumRodjenja',adresa = '$this->adresa',
                   brojTelefona = '$this->brojTelefona' WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM clanovi WHERE id=$this->id";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM clanovi";
        return $conn->query($upit);
    }


    public static function getById($id, mysqli $conn){
        $upit = "SELECT * FROM clanovi WHERE id=$id";

        $clan = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $clan[]= $red;
            }
        }

        return $clan;
    }


}