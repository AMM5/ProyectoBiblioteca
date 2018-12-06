<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once("../formularios/ClassForm.php");
require_once("../Books.php");

    if (!isset($_GET['name'])) {
        $name_book = $_POST["name"];
    } else {
        $name_book = $_GET['name'];
    }

    $seeBook = new ClassForm("reservDate.php?id={$_GET['id']}&name={$name_book}","Send", "");
    $seeBook->addField("name" ,"Name Book:","text", $name_book, "readonly");
    $seeBook->addField("reserve" ,"Reserve date:","date","", "required");

    echo "<h2>Reservation</h2>";

    if(isset($_SESSION["date_reserve"]) && $_SESSION["date_reserve"]== "failed"){
        echo "<p>Selected Date isn't available.</p>";
        unset($_SESSION['date_reserve']);
    }

    $seeBook->displayForm();

require_once "../layout/footer.php";