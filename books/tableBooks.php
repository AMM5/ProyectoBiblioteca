<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";

    $fields = array ("id","isbn", "Name book","Category","Description", "Name Author","Surname", "Copies", "Update", "Delete");
    $files = array("copies.php", "updatebook.php", "deletebook.php");
    $connectionTable = new table("Users",$fields, $files);
    $connectionTable->paintTableBooks();

require_once "../layout/footer.php";