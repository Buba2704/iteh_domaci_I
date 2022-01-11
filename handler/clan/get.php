<?php

require "../../dbBroker.php";
require "../../model/Clan.php";

if(isset($_POST['id'])){

    $obj = Clan::getById($_POST['id'],$conn);

    echo json_encode($obj);

}

?>