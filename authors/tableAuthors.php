<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";

    $fields = array ("id", "Name Author","Surname", "Update", "Delete");
    $files = array("modifyauthor.php","deleteauthor.php");
    $connectionTable = new table("Authors",$fields, $files);
    $connectionTable->paintTableAuthor();

echo "<a href='addauthor.php'>Add Author</a>";
require_once "../layout/footer.php";
