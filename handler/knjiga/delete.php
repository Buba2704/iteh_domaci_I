<?php

require "../../dbBroker.php";
require "../../model/Knjiga.php";

if(isset($_POST['id'])){

    $knjiga = new Knjiga($_POST['id']);

    $status = $knjiga->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>