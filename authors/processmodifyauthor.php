<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once '../Author.php';
    $author = new Author();

    $author->setId($_POST['id']);
    $author->setName($_POST['name']);
    $author->setSurname($_POST['surname']);

    $author->updateAuthor();