<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once '../BD/conexionBD.php';
class CheckReserv {
    private $db;
    function __construct() {
        $this->db = BD::connect();
    }

    function checkDates($id, $date, $userDate) {
        $sql = "select count(*) as total from reservation where id_book= {$id} and takenDate between '{$date}' and '{$userDate}';";

        $res = $this->db->query($sql);

        $count = $res->fetch_assoc();

        if ($count['total']<2) {
            return true;
        } else {
            return false;
        }
    }

    function checkreserve($dates, $id) {

        $date = new DateTime($dates);
        $userDate = $date->format('Y-m-d');
        $date->sub(new DateInterval("P21D"));

        $userDateLess20 = $date->format('Y-m-d');

        $date->add(new DateInterval('P41D'));
        $userDateAdd20 = $date->format('Y-m-d');

        $result1 = $this->checkDates($id,$userDateLess20,$userDate);

        $result2 = $this->checkDates($id,$userDateAdd20, $userDate);

        if($result1 && $result2){
            // Create Reserve
            echo "que tal";
        }else{
            echo "hola";
            //$_SESSION['error_date_reserve'] = "Selected Date isn't available ";
            header('Location:processBook.php?id='.$id.'&name='.$_GET['name']);
        }
    }
}