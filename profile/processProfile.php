<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

    if(!isset($_SESSION)) session_start();


    require_once ("../User.php");

    $usr = new User ();
    if(isset($_GET['id'])) {
        $usr->setId($_GET['id']);
    } else {
        $usr->setId($_SESSION['login']->id);
    }
    $usr->setNameUser($_POST["name"]);
    $usr->setFirstSurname($_POST["surname1"]);
    $usr->setSecondSurname($_POST["surname2"]);
    $usr->setDni($_POST["dni"]);
    $usr->setEmail($_POST["email"]);
    $usr->setPhoneNumber($_POST["phone"]);
    $usr->setUsername($_POST["username"]);


    $usr->updateData();