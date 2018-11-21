<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once ("../User.php");

    $usr = new User ();

    $usr->setNameUser($_POST["name"]);
    $surname1 = $usr->setFirstSurname($_POST["surname1"]);
    $surname2 = $usr->setSecondSurname($_POST["surname2"]);
    $dni = $usr->setDni($_POST["dni"]);
    $email = $usr->setEmail($_POST["email"]);
    $phone = $usr->setPhoneNumber($_POST["phone"]);
    $username = $usr->setUsername($_POST["username"]);
    $pwd = $usr->setPassword($_POST["pwd"]);

    $usr->insertDate();