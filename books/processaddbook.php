<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once ("../Books.php");

    $books = new Books ();

    $books->setNameBook($_POST["name"]);
    $books->setIsbn($_POST["isbn"]);
    $books->setCategory($_POST["category"]);
    $books->setDescription($_POST["description"]);
    $books->setAuthorId($_POST["author"]);


    // Img
    $file = $_FILES['photo'];
    $filename = $_POST["isbn"];
    $mimetype = $file['type'];
   // echo $file;
    /*echo $filename;
    echo $mimetype;
    die();*/
    if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg'){
        if(!is_dir('../img')){
            mkdir('../img',0777, true);
        }
        move_uploaded_file($file['tmp_name'], '../img/'.$filename.'.jpg');
    }

    $books->insertBook();