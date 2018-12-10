<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";

    $fields = array ("id","isbn", "Name book","Category","Description", "Name Author","Surname", "Copies", "Modify", "Delete");
    $files = array("copies.php", "modifybook.php", "deletebook.php");
    $connectionTable = new table("Books",$fields, $files);
    echo "<a class='btn btn-success add' href='addbooks.php'>Add Book</a>
            <a class='btn btn-success add' href='../authors/tableAuthors.php'>Authors</a>";
    $connectionTable->paintTableBooks();

require_once "../layout/footer.php";