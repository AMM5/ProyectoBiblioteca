<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../formularios/ClassForm.php";
require_once "../Author.php";

    $a = new Author();
    $a->setId($_GET['id']);

    $a1 = $a->selectAuthor();

    $author = new ClassForm("processmodifyauthor.php","Save", "");


    $author->addField("id","ID:","number", $a1['id'], "readonly required class='form-control'");
    $author->addField("name","Name:","text",$a1['name_author'], "required class='form-control'");
    $author->addField("surname","Surname:","text",$a1['first_surname'], "required class='form-control'");

echo "<div class='wrapper'>";
echo "<div class='container'>";
    echo "<h2>Modify Author</h2>";
    if(isset($_SESSION["updateAuthor"]) && $_SESSION["updateAuthor"] == "failed"){
        echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
        unset($_SESSION['updateAuthor']);
    }
    $author->displayForm();

echo "</div>";
echo "</div>";


require_once "../layout/footer.php";