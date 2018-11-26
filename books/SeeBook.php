<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once "../links/links.php";
    require_once "../layout/header.php";
    require_once("../formularios/ClassForm.php");
    require_once ("Books.php");
    $seeBook = new ClassForm("processBook.php","", "");

    $book = new Books();
    $book->setId($_GET['id']);

    $bok = $book->oneBook();
    $dataBook = $bok->fetch_assoc();

    $seeBook->addField("isbn","ISBN:","text",$dataBook['isbn'], "disabled");
    $seeBook->addField("name" ,"Name Book:","text",$dataBook['name_book'], "disabled");
    $seeBook->addField("category" ,"Category:","text",$dataBook['category'], "disabled");
    $seeBook->addField("description" ,"Description:","text",$dataBook['description'], "disabled");
    $seeBook->addField("author" ,"Name Author:","text",$dataBook['name_author'], "disabled");
    $seeBook->addField("surname" ,"First Surname:","text",$dataBook['first_surname'], "disabled");

    echo "<h2>{$dataBook['name_book']}</h2>";

    $seeBook->displayForm();

require_once "../layout/footer.php";