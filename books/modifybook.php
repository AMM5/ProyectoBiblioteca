<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../formularios/ClassForm.php";
require_once "../Books.php";
require_once "../Author.php";

    $seeBook = new ClassForm("processmodifybook?id={$_GET['id']}","", "");

    $author = new Author();
    $author1 = $author->selectAllAuthor();
    $book = new Books();
    $book->setId($_GET['id']);

    $bok = $book->oneBook();
    $dataBook = $bok->fetch_assoc();

    echo "<form action='processmodifybook.php?id={$_GET['id']}' method='POST'>";
        $seeBook->addField("isbn","ISBN:","text",$dataBook['isbn'], "");
        $seeBook->addField("name" ,"Name Book:","text",$dataBook['name_book'], "");
        $seeBook->addField("category" ,"Category:","text",$dataBook['category'], "");
        $seeBook->addField("description" ,"Description:","text",$dataBook['description'], "");


        echo "<h2>Modify Book</h2>";

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
    echo "<img src=\"../img/{$dataBook['isbn']}.jpg\" alt=\"books\" width='220px' height='278.99px'/>";


require_once "../layout/footer.php";