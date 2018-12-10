<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../formularios/ClassForm.php";
require_once "../Books.php";

    $author = new ClassForm("processauthor.php","Save", "Reset");

    $author->addField("name","Name:","text","", "required class='form-control'");
    $author->addField("surname","Surname:","text","", "required class='form-control'");

echo "<div class='wrapper'>";
echo "<div class='container'>";
    echo "<h2>Add Author</h2>";
    echo "<p>Please insert the data of the author.</p>";
    if(isset($_SESSION["insertAuthor"]) && $_SESSION["insertAuthor"] == "failed"){
        echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
        unset($_SESSION['insertAuthor']);
    }
    $author->displayForm();
echo "</div>";
echo "</div>";

require_once "../layout/footer.php";