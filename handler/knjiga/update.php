<?php

require "../../dbBroker.php";
require "../../model/Knjiga.php";

if( isset($_POST['id']) &&
    isset($_POST['naziv']) &&
    isset($_POST['pisac']) &&
    isset($_POST['zanr']) &&
    isset($_POST['opis']) &&
    isset($_POST['datumIzdavanja'])){

    $knjiga = new Knjiga($_POST['id'],$_POST['naziv'],$_POST['pisac'],$_POST['zanr'],$_POST['opis'],$_POST['datumIzdavanja']);

    $status = $knjiga->update($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>