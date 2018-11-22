<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    if(!isset($_SESSION)) session_start();

    if (isset($_SESSION["login"])) {
        unset($_SESSION["login"]);
    }
    if (isset($_SESSION["librarian"])) {
        unset($_SESSION["librarian"]);
    }
    if (isset($_SESSION["admin"])){
        unset($_SESSION["admin"]);
    }

    header("location:../index.php");