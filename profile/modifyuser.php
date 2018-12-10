<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once "../links/links.php";
require_once "../layout/header.php";
require_once "../formularios/ClassForm.php";
require_once "../User.php";

    $users = new User();
    $users->setId($_GET['id']);

    $user1 = $users->selectUser();
    $user = $user1->fetch_object();

    $profile = new ClassForm("processProfile.php?id={$_GET['id']}","Save", "");

    $profile->addField("name","Name:","text",$user->name_user, "required class='form-control'");
    $profile->addField("surname1" ,"First Surname:","text", $user->first_surname, "required class='form-control'");
    $profile->addField("surname2","Second Surname:","text", $user->second_surname, "required class='form-control'");
    $profile->addField("dni","DNI:","text", $user->dni, "required class='form-control'");
    $profile->addField("email","Email:","email", $user->email, "required class='form-control'");
    $profile->addField("phone","Phone Number:","tel", $user->phone_number, "required class='form-control'");
    $profile->addField("username","Username:","text", $user->username, "required class='form-control'");

echo "<div class='wrapper'>";
echo "<div class='container'>";
    echo "<h2>Profile</h2>";

    if (isset($_SESSION['updateUser']) && $_SESSION['updateUser'] == "failed") {
        echo "<p class='alert alert-warning'>The data entered haven't been correct.</p>";
        unset($_SESSION['updateUser']);
    }

    $profile->displayForm();
echo "</div>";
echo "</div>";


require_once "../layout/footer.php";
?>