<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once ("../User.php");

    $usr = new User ();

    $usr->setUsername($_POST["user"]);
    $usr->setPassword($_POST["pwd"]);

    $usr->checklogin();
