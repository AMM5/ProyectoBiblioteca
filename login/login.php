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

        $loginform = new ClassForm("processlogin.php","Login", "Reset");

        $loginform->addField("user","Username:","text");
        $loginform->addField("pwd" ,"Password:","password");

        echo "<h2>Login</h2>";
        echo "<p>Please fill in your credentials to login.</p>";

        if(isset($_SESSION["login"]) && !is_object($_SESSION["login"])){
            echo "<p>The data entered haven't been correct.</p>";
            unset($_SESSION['login']);
        }

        $loginform->displayForm();
    ?>
</body>
</html>