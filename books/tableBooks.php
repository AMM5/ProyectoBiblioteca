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
    $connectionTable->paintTableBooks();

    echo "<aside>
            <p><a href='addbooks.php'>Add Book</a></p>
            <p><a href='../authors/tableAuthors.php'>Authors</a></p>
          </aside>";
require_once "../layout/footer.php";