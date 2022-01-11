<?php

require "../../dbBroker.php";
require "../../model/Pozajmica.php";

if(isset($_POST['id']) &&
    isset($_POST['datum']) &&
    isset($_POST['knjigaId']) &&
    isset($_POST['clanId']) &&
    isset($_POST['napomena'])){

    $pozajmica = new Pozajmica($_POST['id'],$_POST['datum'],$_POST['knjigaId'],$_POST['clanId'],$_POST['napomena']);

    $status = $pozajmica->update($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>