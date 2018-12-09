<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../Books.php";

    $books = new Books();
    $books->setId($_GET['id']);

    $books->deleteBook();
