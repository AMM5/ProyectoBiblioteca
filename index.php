<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="home.css"/>
        <title>Home</title>

    </head>
    <body>
        <header class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="img/1.jpg" />
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="img/2.jpg"/>
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="img/3.jpg"/>
                <div class="text">Caption Three</div>
            </div>
        </header>
        <div class="puntos" style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <script type="text/javascript" src="js/js.js"></script>

        <!--MENU-->
        <nav>
            <ul>
                <li><a href="#">Books</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Events</a></li>
                <li><button onclick="document.getElementById('login').style.display='flex'" style="background-color: white;">Login</button></li>
            </ul>
        </nav>
        <!--Login-->
        <div id="login" class="modal">

            <form class="modal-content animate" action="/action_page.php">
                <div class="form">
                    <div class="cruzCerrar">
                        <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>

                    <div class="container">
                        <label for="user"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="user" required>

                        <label for="psw"><b>Password</b><span class="psw">Forgot <a href="#">password?</a></span></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="submit" class="submit">Login</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button class="create">Create your Library account</button>
                    </div>
                </div>
            </form>
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
