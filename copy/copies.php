<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";

    $fields = array ("id", "Name book","Status", "Update", "Delete");
    $files = array("updatecopy.php","deletecopy.php");
    $connectionTable = new table("Copies",$fields, $files);
    $connectionTable->paintTableCopy($_GET['id']);

    echo "<a href='addcopies.php?id={$_GET['id']}'>Add Copies</a>";
require_once "../layout/footer.php";