<?php

require "../../dbBroker.php";
require "../../model/Pozajmica.php";

if(isset($_POST['id'])){

    $obj = Pozajmica::getById($_POST['id'],$conn);

    echo json_encode($obj);

}

?>