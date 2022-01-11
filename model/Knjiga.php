<?php

class Knjiga
{

    private $id;
    private $naziv;
    private $pisac;
    private $zanr;
    private $opis;
    private $datumIzdavanja;

    /**
     * @param $id
     * @param $naziv
     * @param $pisac
     * @param $zanr
     * @param $opis
     * @param $datumIzdavanja
     */
    public function __construct($id=null, $naziv=null, $pisac=null, $zanr=null, $opis=null, $datumIzdavanja=null){
        $this->id = $id;
        $this->naziv = $naziv;
        $this->pisac = $pisac;
        $this->zanr = $zanr;
        $this->opis = $opis;
        $this->datumIzdavanja = $datumIzdavanja;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * @param mixed $naziv
     */
    public function setNaziv($naziv): void
    {
        $this->naziv = $naziv;
    }

    /**
     * @return mixed
     */
    public function getPisac()
    {
        return $this->pisac;
    }

    /**
     * @param mixed $pisac
     */
    public function setPisac($pisac): void
    {
        $this->pisac = $pisac;
    }

    /**
     * @return mixed
     */
    public function getZanr()
    {
        return $this->zanr;
    }

    /**
     * @param mixed $zanr
     */
    public function setZanr($zanr): void
    {
        $this->zanr = $zanr;
    }

    /**
     * @return mixed
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis): void
    {
        $this->opis = $opis;
    }

    /**
     * @return mixed
     */
    public function getDatumIzdavanja()
    {
        return $this->datumIzdavanja;
    }

    /**
     * @param mixed $datumIzdavanja
     */
    public function setDatumIzdavanja($datumIzdavanja): void
    {
        $this->datumIzdavanja = $datumIzdavanja;
    }

    public function add(mysqli $conn){
        $upit = "INSERT INTO knjige (naziv,pisac,zanr,opis,datumIzdavanja) 
                 VALUES ('$this->naziv','$this->pisac','$this->zanr','$this->opis','$this->datumIzdavanja');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE knjige set naziv = '$this->naziv',pisac = '$this->pisac',
                   zanr = '$this->zanr',opis = '$this->opis',
                   datumIzdavanja = '$this->datumIzdavanja' WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM knjige WHERE id=$this->id";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM knjige";
        return $conn->query($upit);
    }


    public static function getById($id, mysqli $conn){
        $upit = "SELECT * FROM knjige WHERE id=$id";

        $knjiga = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $knjiga[]= $red;
            }
        }

        return $knjiga;
    }



}