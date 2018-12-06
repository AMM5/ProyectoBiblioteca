<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../User.php";

$users = new User();
$users->setId($_GET['id']);

$user1 = $users->deleteUser();