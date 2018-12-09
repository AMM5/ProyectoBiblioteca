<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

if(!isset($_SESSION)) session_start();
    require_once ("../User.php");

    $usr = new User ();

    $usr->setNameUser($_POST["name"]);
    $usr->setFirstSurname($_POST["surname1"]);
    $usr->setSecondSurname($_POST["surname2"]);
    $usr->setDni($_POST["dni"]);
    $usr->setEmail($_POST["email"]);
    $usr->setPhoneNumber($_POST["phone"]);
    $usr->setUsername($_POST["username"]);
    $usr->setPassword($_POST["pwd"]);

    if (isset($_SESSION['admin'])) {
        $usr->setTypeUser($_POST['usertype']);
    }


    $usr->insertDate();