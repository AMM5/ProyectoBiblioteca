<?php
if(!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>css/home.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>css/register.css"/>
    <title>Home</title>

</head>
    <body>
        <header>
            <h1>Logo</h1>
        </header>

        <!--MENU-->
        <nav>
            <ul>
                <li><a href="<?=URL?>index.php">Home</a></li>
                <?php if (!isset($_SESSION["login"])):?>
                    <li><a href="<?=URL?>login/login.php">Login</a></li>
                    <li><a href="<?=URL?>register/register.php">Sign Up</a></li>
                <?php else: ?>
                    <li><a href="<?=URL?>profile/profile.php">My Profile </a></li>
                    <?php if(isset($_SESSION["librarian"])): ?>
                        <li><a href="<?=URL?>tables/tableUser.php">Users</a></li>
                        <li><a href="#">Books</a></li>
                    <?php elseif(isset($_SESSION["admin"])): ?>
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Librarians</a></li>
                    <?php endif;?>
                    <li><a href="<?=URL?>reservation/reservation.php"">Reservation</a></li>
                    <li><form action="<?=URL?>login/logout.php"><input type="submit" value="Logout"/></form></li>
                <?php endif;?>
            </ul>
        </nav>