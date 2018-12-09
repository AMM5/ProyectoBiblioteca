<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once("../formularios/ClassForm.php");
require_once("../Books.php");

    $book = new Books();
    $book->setId($_GET['id']);

    $bok = $book->oneBook();
    $dataBook = $bok->fetch_assoc();

    $addcopy = new ClassForm("processmodifycopy.php?id={$_GET['id']}","Send", "");

    $addcopy->addField("book","Name Book:","text",$dataBook['name_book'], "readonly");
    $addcopy->addField("stat" ,"Status:","text",$_GET['status'], "required");

    echo "<h2>Modify Copy</h2>";
    echo "<p>Please insert copy.</p>";

    /*if(isset($_SESSION["login"]) && !is_object($_SESSION["login"])){
        echo "<p>The data entered haven't been correct.</p>";
        unset($_SESSION['login']);
    }*/

    $addcopy->displayForm();

require_once "../layout/footer.php";