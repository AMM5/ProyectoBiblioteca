<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once '../BD/conexionBD.php';
class CheckReserv {

    function __construct() {
        $this->db = BD::connect();
    }

    function checkreserv($dates, $id) {

        $date = new DateTime($dates);
        $date->sub(new DateInterval("P21D"));

        $sql = "select count(*) as total from reservation where id_book= {$id} and takenDate between '{$date}' and '{$userDate2}';";


        /*$id = $_POST['id'];
        $date = $_POST['takenDate'];
        /var_dump($_POST);
        die();/
        $dateObj = new DateTime($date);
        $userDate = $dateObj->format('Y-m-d');

        $dateObj->sub(new DateInterval('P21D'));
        $userDateLess20 = $dateObj->format('Y-m-d');

        $dateObj->add(new DateInterval('P41D'));
        $userDateAdd20 = $dateObj->format('Y-m-d');

        /echo $dateObj->format('Y-m-d');
        die();/
        $reserveObj = new Reserve();
        $result1 = $reserveObj->checkDates($userDateLess20, $userDate, $id);

        $result2 = $reserveObj->checkDates($userDate, $userDateAdd20, $id);

        if($result1 && $result2){
            // Create Reserve
        }else{
            $_SESSION['error_date_reserve'] = "Selected Date isn't available ";
            header('Location:'.BASE_URL.'Reserve/create&id='.$id);
        }*/
    }
}