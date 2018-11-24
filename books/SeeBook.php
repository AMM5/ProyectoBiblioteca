<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

    require_once("../formularios/ClassForm.php");
    $loginform = new ClassForm("processBook.php","Login", "Reset");

    $loginform->addField("user","Username:","text","");
    $loginform->addField("pwd" ,"Password:","password","");

    echo "<h2>Login</h2>";
    echo "<p>Please fill in your credentials to login.</p>";

    if(isset($_SESSION["login"]) && !is_object($_SESSION["login"])){
        echo "<p>The data entered haven't been correct.</p>";
        unset($_SESSION['login']);
    }

    $loginform->displayForm();