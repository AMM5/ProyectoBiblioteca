<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../tables/table.php";
if(!isset($_SESSION)) session_start();
    $fields = array ("id","username", "Name User","First Surname","Second Surname", "DNI", "Email", "Phone Number", "Browser", "Update", "Delete");
    $files = array("reservation.php", "modifyuser.php", "deleteUser.php", "borrow.php");
    $connectionTable = new table("Users",$fields, $files);

    if (isset($_SESSION['admin'])) {
        echo "<a class='btn btn-success add' href='".URL."register/register.php'>Add User/Librarian</a>";
    } else {
        echo "<a class='btn btn-success add' href='".URL."register/register.php'>Add User</a>";
    }

    $connectionTable->paintTableUser();

require_once "../layout/footer.php";