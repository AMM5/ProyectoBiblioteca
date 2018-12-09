<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../formularios/ClassForm.php";
require_once "../Books.php";

    $author = new ClassForm("processauthor.php","Save", "");

    $author->addField("name","Name:","text","", "required");
    $author->addField("surname","Surname:","text","", "required");


    echo "<h2>Add Author</h2>";

    $author->displayForm();




require_once "../layout/footer.php";