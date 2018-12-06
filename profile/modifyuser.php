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

    $profile->addField("name","Name:","text",$user->name_user, "");
    $profile->addField("surname1" ,"First Surname:","text", $user->first_surname, "");
    $profile->addField("surname2","Second Surname:","text", $user->second_surname, "");
    $profile->addField("dni","DNI:","text", $user->dni, "");
    $profile->addField("email","Email:","email", $user->email, "");
    $profile->addField("phone","Phone Number:","tel", $user->phone_number, "");
    $profile->addField("username","Username:","text", $user->username, "");

    echo "<h2>Profile</h2>";
    //echo "<p>Please fill this form to create an account.</p>";
    if (isset($_SESSION['updateUser']) && $_SESSION['updateUser'] == "failed") {
        echo "<p>The data entered haven't been correct.</p>";
        unset($_SESSION['updateUser']);
    }

    $profile->displayForm();


require_once "../layout/footer.php";
?>