<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "CheckReserv.php";
if(!isset($_SESSION)) session_start();
if (isset($_SESSION['login'])) {
    $obj = new CheckReserv();
    $id = $_GET['id'];
    $date = $_POST["reserve"];

    if (isset($_SESSION['admin']) || isset($_SESSION['librarian'])) {
        $_SESSION['idClient'] = $_POST["idClient"];
    }
    $obj->checkreserve($date, $id);
} else {
    header("location:../login/login.php");
}
