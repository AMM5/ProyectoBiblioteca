<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

    require_once("../formularios/ClassForm.php");
    $seeBook = new ClassForm("processBook.php","", "");

    $book = new Books();
    $book->setId($_GET['id']);

    $dataBook = $book->oneBook();

    $seeBook->addField("isbn","ISBN:","text","");
    $seeBook->addField("name" ,"Name Book:","text","");
    $seeBook->addField("category" ,"Category:","text","");
    $seeBook->addField("description" ,"Description:","text","");
    $seeBook->addField("author" ,"Author:","text","");

    echo "<h2>Login</h2>";
    echo "<p>Please fill in your credentials to login.</p>";

    if(isset($_SESSION["login"]) && !is_object($_SESSION["login"])){
        echo "<p>The data entered haven't been correct.</p>";
        unset($_SESSION['login']);
    }

    $loginform->displayForm();