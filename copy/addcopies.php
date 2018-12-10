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

    $addcopy = new ClassForm("processinsertcopy.php?id={$_GET['id']}","Send", "Reset");

    $addcopy->addField("book","Name Book:","text",$dataBook['name_book'], "readonly required class='form-control'");
    $addcopy->addField("stat" ,"Status:","text","", "required class='form-control'");

echo "<div class='wrapper'>";
echo "<div class='container'>";
    echo "<h2>Insert Copy</h2>";
    echo "<p>Please insert copy.</p>";

        if(isset($_SESSION["insertCopy"]) && $_SESSION["insertCopy"] == "failed"){
            echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
            unset($_SESSION['insertCopy']);
        }

    $addcopy->displayForm();

echo "</div>";
echo "</div>";

require_once "../layout/footer.php";