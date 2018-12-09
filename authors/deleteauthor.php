<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once '../Author.php';
    $author = new Author();

    $author->setId($_GET['id']);
    $author->deleteAuthor();
