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
        <link rel="stylesheet" type="text/css" href="css/home.css"/>
        <title>Home</title>

    </head>
    <body>
        <header>
            <h1>Logo</h1>
        </header>

        <script type="text/javascript" src="js/js.js"></script>

        <!--MENU-->
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <?php if (!isset($_SESSION["login"])):?>
                    <li><a href="login/login.php">Login</a></li>
                    <li><a href="register/register.php">Sign Up</a></li>
                <?php else: ?>
                    <li><a href="#">My Profile </a></li>
                    <?php if(isset($_SESSION["librarian"])): ?>
                        <li><a href="#">Users</a></li>
                    <?php elseif(isset($_SESSION["admin"])): ?>
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Librarians</a></li>
                    <?php endif;?>
                    <li><a href="#">Reservation</a></li>
                    <li><form action="login/logout.php"><input type="submit" value="Logout"/></form></li>
                <?php endif;?>
            </ul>
        </nav>
        <!--Login-->
        <div id="login" class="modal">
        </div>

        <!--BOOKS-->
        <div class="books">
            <a href="#">Books</a>
        </div>

        <!--NEWS-->
        <div class="news">
            <a href="#">News</a>
        </div>

        <!--EVENTS-->
        <div class="events">
            <a href="#">Events</a>
        </div>
    </body>
</html>
