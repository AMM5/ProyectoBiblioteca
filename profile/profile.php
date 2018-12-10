<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    require_once "../links/links.php";
    require_once "../layout/header.php";
    require_once "../formularios/ClassForm.php";




    $user = $_SESSION['login'];

    $profile = new ClassForm("processProfile.php","Save", "");

    $profile->addField("name","Name:","text",$user->name_user, "required class='form-control'");
    $profile->addField("surname1" ,"First Surname:","text", $user->first_surname, "required class='form-control'");
    $profile->addField("surname2","Second Surname:","text", $user->second_surname, "required class='form-control'");
    $profile->addField("dni","DNI:","text", $user->dni, "required class='form-control'");
    $profile->addField("email","Email:","email", $user->email, "required class='form-control'");
    $profile->addField("phone","Phone Number:","tel", $user->phone_number, "required class='form-control'");
    $profile->addField("username","Username:","text", $user->username, "required class='form-control'");
    echo "<div class='wrapper'>";
        echo "<div class='container'>";
            echo "<h2>My Profile</h2>";
            //echo "<p>Please fill this form to create an account.</p>";
            if (isset($_SESSION['updateUser']) && $_SESSION['updateUser'] == "failed") {
                echo "<p>The data entered haven't been correct.</p>";
                unset($_SESSION['updateUser']);
            }

            $profile->displayForm();
    echo "</div>";
echo "</div>";


    require_once "../layout/footer.php";
?>