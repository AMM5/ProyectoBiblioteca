<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
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

    $usr->insertDate();