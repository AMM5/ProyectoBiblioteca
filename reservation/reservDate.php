<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "CheckReserv.php";

    $obj = new CheckReserv();
    $id = $_GET['id'];
    $date = $_POST["reserve"];



    $obj->checkreserve($date, $id);
