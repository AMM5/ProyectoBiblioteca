<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";
if(!isset($_SESSION)) session_start();
    $fields = array ("id","username", "Name User","First Surname","Second Surname", "DNI", "Email", "Phone Number", "Update", "Delete");
    $files = array("modifyuser.php", "deleteUser.php");
    $connectionTable = new table("Librarians",$fields, $files);
    $connectionTable->paintTableLibrarian();

    if (isset($_SESSION['admin'])) {
        echo "<a href='".URL."register/register.php'>Add User/Librarian</a>";
    }

require_once "../layout/footer.php";