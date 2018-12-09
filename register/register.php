
<?php
require_once "../links/links.php";
require_once "../layout/header.php";
    if(!isset($_SESSION)) session_start();
    /* Script name: buildForm
     *  Description: Uses the form to create a simple HTML form
     */
    require_once("../formularios/ClassForm.php");

    $phone_form = new ClassForm("process.php","Submit", "Reset");

    $phone_form->addField("name","Name:","text","", "");
    $phone_form->addField("surname1" ,"First Surname:","text","", "");
    $phone_form->addField("surname2","Second Surname:","text","", "");
    $phone_form->addField("dni","DNI:","text","", "");
    $phone_form->addField("email","Email:","email","", "");
    $phone_form->addField("phone","Phone Number:","tel","", "");
    $phone_form->addField("username","Username:","text","", "");
    $phone_form->addField("pwd","Password:","password","", "");
    $phone_form->addField("pwd2","Confirm Password:","password","", "");

    if (isset($_SESSION['librarian'])) {
        echo "<h2>Add User</h2>";
    } else if($_SESSION['admin']) {
        echo "<h2>Add User/Librarian</h2>";
    } else {
        echo "<h2>Sign Up</h2>";
    }
    echo "<p>Please fill this form to create an account.</p>";

    if (isset($_SESSION['register']) && $_SESSION['register'] == "failed") {
        echo "<p>The data entered haven't been correct.</p>";
        unset($_SESSION['register']);
       // unset($_SESSION['login']);
    }
    $phone_form->displayForm();
require_once "../layout/footer.php";
?>
