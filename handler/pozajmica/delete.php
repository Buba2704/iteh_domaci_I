<?php

require "../../dbBroker.php";
require "../../model/Pozajmica.php";

if(isset($_POST['id'])){

    $pozajmica = new Pozajmica($_POST['id']);

    $status = $pozajmica->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>