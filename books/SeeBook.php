<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once "../links/links.php";
    require_once "../layout/header.php";
    require_once("../formularios/ClassForm.php");
    require_once("../Books.php");
    require_once("../User.php");
    if(!isset($_SESSION)) session_start();
    $user = new User();
    $user1 = $user->selectAllUser();


    $book = new Books();
    $book->setId($_GET['id']);

    $bok = $book->oneBook();
    $dataBook = $bok->fetch_assoc();

    if (isset($_SESSION['admin'])||isset($_SESSION['librarian'])) {
        $_SESSION['reserveToClient'] = 'completed';
        $seeBook = new ClassForm("","", "");

        $seeBook->addField("isbn","ISBN:","text",$dataBook['isbn'], "readonly required class='form-control'");
        $seeBook->addField("name" ,"Name Book:","text",$dataBook['name_book'], "readonly required class='form-control'");
        $seeBook->addField("category" ,"Category:","text",$dataBook['category'], "readonly required class='form-control'");
        $seeBook->addField("description" ,"Description:","text",$dataBook['description'], "readonly required class='form-control'");
        $seeBook->addField("author", "Name Author:", "text", $dataBook['name_author'], "readonly required class='form-control'");
        $seeBook->addField("surname", "First Surname:", "text", $dataBook['first_surname'], "readonly required class='form-control'");

        echo "<div class='wrapper padreimagen'>";
        echo "<div class='container'>";
        echo "<h2>{$dataBook['name_book']}</h2>";
        echo "<form action='../reservation/processBook.php?id={$_GET['id']}' method='POST'>";
        $seeBook->paintLabelInput();
        echo "<p>Select client</p>";
        echo "<select name='user' class='form-control'>";
        while($user2 = $user1->fetch_object()) {
            echo "<option value='{$user2->id}'>{$user2->username}</option>";
        }
        echo "</select>";

        echo "<div class='form-group'>";
        echo "<input type='submit' value='Save' class='btn btn-primary'/>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "<img class ='imagen' src=\"../img/{$dataBook['isbn']}.jpg\" alt=\"books\" width='220px' height='278.99px'/>";
        echo "</div>";

    } else {
        $seeBook = new ClassForm("../reservation/processBook.php?id={$_GET['id']}","Reserve", "");

        $seeBook->addField("isbn", "ISBN:", "text", $dataBook['isbn'], "readonly required class='form-control'");
        $seeBook->addField("name", "Name Book:", "text", $dataBook['name_book'], "readonly required class='form-control'");
        $seeBook->addField("category", "Category:", "text", $dataBook['category'], "readonly required class='form-control'");
        $seeBook->addField("description", "Description:", "text", $dataBook['description'], "readonly required class='form-control'");
        $seeBook->addField("author", "Name Author:", "text", $dataBook['name_author'], "readonly required class='form-control'");
        $seeBook->addField("surname", "First Surname:", "text", $dataBook['first_surname'], "readonly required class='form-control'");
        echo "<div class='wrapper padreimagen'>";
        echo "<div class='container'>";
        echo "<h2>{$dataBook['name_book']}</h2>";

        $seeBook->displayForm();

        echo "</div>";
        echo "<img class ='imagen' src=\"../img/{$dataBook['isbn']}.jpg\" alt=\"books\" width='220px' height='278.99px'/>";
        echo "</div>";
    }


require_once "../layout/footer.php";