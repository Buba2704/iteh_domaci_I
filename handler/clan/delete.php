<?php

require "../../dbBroker.php";
require "../../model/Clan.php";

if(isset($_POST['id'])){

    $clan = new Clan($_POST['id']);

    $status = $clan->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>