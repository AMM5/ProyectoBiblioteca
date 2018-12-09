<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once ("../Books.php");

    $books = new Books ();

    if(isset($_GET['id'])) {
        $books->setId($_GET['id']);
        $books->setNameBook($_POST["name"]);
        $books->setIsbn($_POST["isbn"]);
        $books->setCategory($_POST["category"]);
        $books->setDescription($_POST["description"]);
        $books->setAuthorId($_POST["author"]);
    }

    $books->modifyBook();