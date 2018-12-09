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


    $author->addField("id","ID:","number", $a1['id'], "readonly");
    $author->addField("name","Name:","text",$a1['name_author'], "required");
    $author->addField("surname","Surname:","text",$a1['first_surname'], "required");


    echo "<h2>Add Author</h2>";

    $author->displayForm();


require_once "../layout/footer.php";