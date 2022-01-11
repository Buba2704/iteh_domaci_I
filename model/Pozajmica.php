<?php

class Pozajmica
{

    private $id;
    private $datum;
    private $knjigaId;
    private $clanId;
    private $napomena;

    /**
     * @param $id
     * @param $datum
     * @param $knjigaId
     * @param $clanId
     * @param $napomena
     */
    public function __construct($id = null, $datum=null, $knjigaId=null, $clanId=null, $napomena=null)
    {
        $this->id = $id;
        $this->datum = $datum;
        $this->knjigaId = $knjigaId;
        $this->clanId = $clanId;
        $this->napomena = $napomena;
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
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum): void
    {
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getKnjigaId()
    {
        return $this->knjigaId;
    }

    /**
     * @param mixed $knjigaId
     */
    public function setKnjigaId($knjigaId): void
    {
        $this->knjigaId = $knjigaId;
    }

    /**
     * @return mixed
     */
    public function getClanId()
    {
        return $this->clanId;
    }

    /**
     * @param mixed $clanId
     */
    public function setClanId($clanId): void
    {
        $this->clanId = $clanId;
    }

    /**
     * @return mixed
     */
    public function getNapomena()
    {
        return $this->napomena;
    }

    /**
     * @param mixed $napomena
     */
    public function setNapomena($napomena): void
    {
        $this->napomena = $napomena;
    }

    /**
     * @param $id
     * @param $datum
     * @param $knjigaId
     * @param $clanId
     * @param $napomena
     */

    public function add(mysqli $conn){
        $upit = "INSERT INTO pozajmice (datum,knjigaId,clanId,napomena) 
                 VALUES ('$this->datum','$this->knjigaId','$this->clanId','$this->napomena');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE pozajmice set datum = '$this->datum',knjigaId = '$this->knjigaId',
                   clanId = '$this->clanId',napomena = '$this->napomena' WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM pozajmice WHERE id=$this->id";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT k.naziv,k.pisac,c.ime,c.prezime,p.napomena,p.datum,p.id 
            FROM pozajmice as p INNER JOIN clanovi as c ON p.clanId=c.id INNER JOIN knjige as k ON p.knjigaId=k.id";
        return $conn->query($upit);
    }


    public static function getById($id, mysqli $conn){
        $upit = "SELECT * FROM pozajmice WHERE id=$id";

        $pozajmice = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $pozajmice[]= $red;
            }
        }

        return $pozajmice;
    }


}