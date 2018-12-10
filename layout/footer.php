


<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">Footer Content</h5>
                <p>Here you will find a wide variety of books to read.</p>

            </div>

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled">
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

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Angel Molero
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
    </body>
</html>
