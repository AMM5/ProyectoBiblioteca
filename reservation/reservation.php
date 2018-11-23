<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";
if(!isset($_SESSION)) session_start();
    $fields = array ("dni", "name", "password","modify","delete");
    //$files = array();
    $connectionTable = new table("My Reservarion",$fields);
    $connectionTable->paintTable();
require_once "../layout/footer.php";
?>