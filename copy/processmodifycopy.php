<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once "../Copy.php";
    $copy = new Copy();

    $copy->setId($_GET['id']);
    $copy->setStatus($_POST['stat']);

    $copy->updateCopy();