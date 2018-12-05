<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once("../formularios/ClassForm.php");
require_once("../Books.php");

    $name_book = $_POST["name"];

    $seeBook = new ClassForm("reservDate.php?id={$_GET['id']}","Send", "");
    $seeBook->addField("name" ,"Name Book:","text", $name_book, "readonly");
    $seeBook->addField("reserve" ,"Reserve date:","date","", "required");

    echo "<h2>Reservation</h2>";

    $seeBook->displayForm();

require_once "../layout/footer.php";