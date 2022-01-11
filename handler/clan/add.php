<?php

require "../../dbBroker.php";
require "../../model/Clan.php";

if(isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['datumRodjenja']) &&
    isset($_POST['adresa']) &&
    isset($_POST['brojTelefona'])){

    $clan = new Clan(null,$_POST['ime'],$_POST['prezime'],$_POST['datumRodjenja'],$_POST['adresa'],$_POST['brojTelefona']);

    $status = $clan->add($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}


?>