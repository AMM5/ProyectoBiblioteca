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

    $loginform->addField("user","Username:","text","", "");
    $loginform->addField("pwd" ,"Password:","password","", "");

    echo "<h2>Login</h2>";
    echo "<p>Please fill in your credentials to login.</p>";

    if(isset($_SESSION["login"]) && !is_object($_SESSION["login"])){
        echo "<p>The data entered haven't been correct.</p>";
        unset($_SESSION['login']);
    }

    $loginform->displayForm();

require_once "../layout/footer.php";
?>