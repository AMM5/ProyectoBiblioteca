<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";

    $fields = array ("id","username", "Name User","First Surname","Second Surname", "DNI", "Email", "Phone Number", "Browser", "Update", "Delete");
    $files = array("modifyuser.php", "deleteUser.php", "reservation.php");
    $connectionTable = new table("Users",$fields, $files);
    $connectionTable->paintTableUser();
    echo "<a href='".URL."register/register.php'>Add User</a>";
require_once "../layout/footer.php";