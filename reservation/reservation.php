<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";
if(!isset($_SESSION)) session_start();
    if(isset($_SESSION['librarian'])) {
        $fields = array("Image", "Name Book", "Taken Date", "Return Date", "Browser");
        $files = array("SeeBook.php");
        $connectionTable = new table("Reservation User", $fields, $files);
    } else {
        $fields = array("Image", "Name Book", "Taken Date", "Return Date", "Browser");
        $files = array("SeeBook.php");
        $connectionTable = new table("My Reservation", $fields, $files);
    }
    $connectionTable->paintTableReserv();
require_once "../layout/footer.php";
?>