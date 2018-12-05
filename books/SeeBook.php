<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once "../links/links.php";
    require_once "../layout/header.php";
    require_once("../formularios/ClassForm.php");
    require_once("../Books.php");
    $seeBook = new ClassForm("../reservation/processBook.php?id={$_GET['id']}","Reserve", "");

    $book = new Books();
    $book->setId($_GET['id']);

    $bok = $book->oneBook();
    $dataBook = $bok->fetch_assoc();

    $seeBook->addField("isbn","ISBN:","text",$dataBook['isbn'], "readonly");
    $seeBook->addField("name" ,"Name Book:","text",$dataBook['name_book'], "readonly");
    $seeBook->addField("category" ,"Category:","text",$dataBook['category'], "readonly");
    $seeBook->addField("description" ,"Description:","text",$dataBook['description'], "readonly");
    $seeBook->addField("author" ,"Name Author:","text",$dataBook['name_author'], "readonly");
    $seeBook->addField("surname" ,"First Surname:","text",$dataBook['first_surname'], "readonly");

    echo "<h2>{$dataBook['name_book']}</h2>";

    $seeBook->displayForm();

    echo "<img src=\"../img/{$dataBook['isbn']}.jpg\" alt=\"books\" width='220px' height='278.99px'/>";

require_once "../layout/footer.php";