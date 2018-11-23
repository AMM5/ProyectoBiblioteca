<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/register.css"/>
    <title>Document</title>
</head>
<body>
        <?php
            if(!isset($_SESSION)) session_start();
            /* Script name: buildForm
             *  Description: Uses the form to create a simple HTML form
             */
            require_once("../formularios/ClassForm.php");

            $phone_form = new ClassForm("process.php","Submit", "Reset");

            $phone_form->addField("name","Name:","text","");
            $phone_form->addField("surname1" ,"First Surname:","text","");
            $phone_form->addField("surname2","Second Surname:","text","");
            $phone_form->addField("dni","DNI:","text","");
            $phone_form->addField("email","Email:","email","");
            $phone_form->addField("phone","Phone Number:","tel","");
            $phone_form->addField("username","Username:","text","");
            $phone_form->addField("pwd","Password:","password","");
            $phone_form->addField("pwd2","Confirm Password:","password","");
            echo "<h2>Sign Up</h2>";
            echo "<p>Please fill this form to create an account.</p>";

            if (isset($_SESSION['register']) && $_SESSION['register'] == "failed") {
                echo "<p>The data entered haven't been correct.</p>";
                unset($_SESSION['register']);
               // unset($_SESSION['login']);
            }
            $phone_form->displayForm();

        ?>
</body>
</html>

