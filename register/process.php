<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once ("../User.php");

    $name = $_POST["name"];
    $surname1 = $_POST["surname1"];
    $surname2 = $_POST["surname2"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    $usr = new User ($username, $pwd, $name, $surname1, $surname2, $dni, $email, $phone);

    $usr->insertDate();