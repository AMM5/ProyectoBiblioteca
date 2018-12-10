<?php
require_once "../links/links.php";
require_once "../layout/header.php";
/*user=1, librarian=2,admin=3*/

    if(!isset($_SESSION)) session_start();
    /* Script name: buildForm
     *  Description: Uses the form to create a simple HTML form
     */
    require_once("../formularios/ClassForm.php");

    $loginform = new ClassForm("processlogin.php","Login", "Reset");

    $loginform->addField("user","Username:","text","", "required class='form-control'");
    $loginform->addField("pwd" ,"Password:","password","", "required class='form-control'");
    echo "<div class='wrapper'>";
        echo "<div class='container'>";
            echo "<h2>Login</h2>";
            echo "<p>Please fill in your credentials to login.</p>";

            if(isset($_SESSION["login"]) && !is_object($_SESSION["login"])){
                echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
                unset($_SESSION['login']);
            }

            $loginform->displayForm();
            echo "<p>Don't have an account? <a href='../register/register.php'>Sign up now</a>.</p>";
        echo "</div>";
    echo "</div>";

require_once "../layout/footer.php";
?>