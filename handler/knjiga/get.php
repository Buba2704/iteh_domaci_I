<?php

require "../../dbBroker.php";
require "../../model/Knjiga.php";

if(isset($_POST['id'])){

    $obj = Knjiga::getById($_POST['id'],$conn);

    echo json_encode($obj);

}

?>