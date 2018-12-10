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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=URL?>css/home.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>css/register.css"/>
    <title>Home</title>

</head>
<body>
    <header>
        <img id="log" src="<?=URL?>img/logo.png" alt="Logo" width="100px" height="100px"><div id="text">READING MAKES YOU WISER</div>
    </header>

    <!--MENU-->
    <nav>
        <ul>
            <li><a href="<?=URL?>index.php">Home</a></li>
            <?php if (!isset($_SESSION["login"])):?>
                <li><a class="btn btn-xs btn-primary" href="<?=URL?>login/login.php">Login</a></li>
                <li><a class="btn btn-xs btn-primary" href="<?=URL?>register/register.php">Sign Up</a></li>
            <?php else: ?>
                <li><a href="<?=URL?>profile/profile.php">My Profile</a></li>
                <?php if(isset($_SESSION["librarian"])): ?>
                    <li><a href="<?=URL?>tables/tableUser.php">Users</a></li>
                    <li><a href="<?=URL?>books/tableBooks.php">Books</a></li>
                <?php elseif(isset($_SESSION["admin"])): ?>
                    <li><a href="<?=URL?>tables/tableUser.php">Users</a></li>
                    <li><a href="<?=URL?>librarians/tableLibrarians.php">Librarians</a></li>
                    <li><a href="<?=URL?>books/tableBooks.php">Books</a></li>
                <?php endif;?>
                <li><a href="<?=URL?>reservation/reservation.php"">Reservation</a></li>
                <li><form action="<?=URL?>login/logout.php"><input class="btn btn-xs btn-primary" type="submit" value="Logout"/></form></li>
            <?php endif;?>
        </ul>
    </nav>