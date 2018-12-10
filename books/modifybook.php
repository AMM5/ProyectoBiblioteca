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


        $seeBook->addField("isbn","ISBN:","text",$dataBook['isbn'], "required class='form-control'");
        $seeBook->addField("name" ,"Name Book:","text",$dataBook['name_book'], "required class='form-control'");
        $seeBook->addField("category" ,"Category:","text",$dataBook['category'], "required class='form-control'");
        $seeBook->addField("description" ,"Description:","text",$dataBook['description'], "required class='form-control'");

echo "<div class='wrapper padreimagen'>";
echo "<div class='container'>";
        echo "<h2>Modify Book</h2>";

        if(isset($_SESSION["updateBook"]) && $_SESSION["updateBook"] == "failed"){
            echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
            unset($_SESSION['updateBook']);
        }

        echo "<form action='processmodifybook.php?id={$_GET['id']}' method='POST'>";

        $seeBook->paintLabelInput();

        echo "<select name='author' class='form-control'>";
            while($aut = $author1->fetch_object()) {
                echo "<option value='{$aut->id}'>{$aut->name_author} {$aut->first_surname}</option>";
            }
        echo "</select>";

        echo "<div class='form-group'>";
                echo "<input type='submit' value='Save' class='btn btn-primary'/>";
        echo "</div>";
    echo "</form>";
echo "</div>";
echo "<img class ='imagen' src=\"../img/{$dataBook['isbn']}.jpg\" alt=\"books\" width='220px' height='278.99px'/>";
echo "</div>";


require_once "../layout/footer.php";