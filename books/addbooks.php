<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../formularios/ClassForm.php";
require_once "../Author.php";

    $seeBook = new ClassForm("","", "");

    $author = new Author();
    $author1 = $author->selectAllAuthor();


    $seeBook->addField("isbn","ISBN:","text","", "required class='form-control'");
    $seeBook->addField("name" ,"Name Book:","text","", "requiered class='form-control'");
    $seeBook->addField("category" ,"Category:","text","", "requiered class='form-control'");
    $seeBook->addField("description" ,"Description:","text","", "requiered class='form-control'");
    $seeBook->addField("photo" ,"Introduction Photo:","file","", "accept='image/jpg'");

echo "<div class='wrapper'>";
echo "<div class='container'>";
    echo "<h2>Insert Book</h2>";
    echo "<p>Please insert the data of the book.</p>";
    if(isset($_SESSION["addbook"]) && $_SESSION["addbook"] == "failed"){
        echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
        unset($_SESSION['addbook']);
    }
echo "<form action='processaddbook.php' method='POST' enctype=\"multipart/form-data\">";
    $seeBook->paintLabelInput();

    echo "<select name='author' class='form-control'>";
        while($aut = $author1->fetch_object()) {
            echo "<option value='{$aut->id}'>{$aut->name_author} {$aut->first_surname}</option>";
        }
    echo "</select>";

    echo "<div class='botones'>";
        echo "<input type='submit' value='Save' class='btn btn-primary'/>";
        echo "<input type='reset' value='Reset' class='btn btn-default'/>";
    echo "</div>";
    echo "</form>";
echo "</div>";
echo "</div>";
require_once "../layout/footer.php";