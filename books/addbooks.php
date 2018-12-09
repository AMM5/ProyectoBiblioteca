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

    echo "<form action='processaddbook.php' method='POST' enctype=\"multipart/form-data\">";
    $seeBook->addField("isbn","ISBN:","text","", "required");
    $seeBook->addField("name" ,"Name Book:","text","", "requiered");
    $seeBook->addField("category" ,"Category:","text","", "requiered");
    $seeBook->addField("description" ,"Description:","text","", "requiered");
    $seeBook->addField("photo" ,"Introduction Photo:","file","", "accept='image/jpg'");


    echo "<h2>Insert Book</h2>";

    $seeBook->paintLabelInput();

    echo "<select name='author'>";
        while($aut = $author1->fetch_object()) {
            echo "<option value='{$aut->id}'>{$aut->name_author} {$aut->first_surname}</option>";
        }
    echo "</select>";

    echo "<div class='botones'>";
        echo "<input type='submit' value='Save'/>";
    echo "</div>";
    echo "</form>";
require_once "../layout/footer.php";