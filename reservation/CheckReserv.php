<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
if(!isset($_SESSION)) session_start();
require_once '../BD/conexionBD.php';
class CheckReserv {
    private $db;
    function __construct() {
        $this->db = BD::connect();
    }

    function insertReserve($id, $userDate) {
        if (isset($_SESSION['admin'])||isset($_SESSION['admin'])) {
            $user = $_SESSION["idClient"];
            $sqlInsert = "INSERT INTO reservation VALUES (null, $id, $user, '{$userDate}')";
            if (mysqli_query($this->db, $sqlInsert)) {
                $_SESSION['date_reserve'] = "completed";
                header("location:../index.php");
            } else {
                echo "ERROR";
            }
        } elseif (isset($_SESSION["login"])) {
            $user = $_SESSION["login"];
            $sqlInsert = "INSERT INTO reservation VALUES (null, $id, $user->id, '{$userDate}')";
            if (mysqli_query($this->db, $sqlInsert)) {
                $_SESSION['date_reserve'] = "completed";
                header("location:reservation.php");
            } else {
                echo "ERROR";
            }
        }
    }

    function checkDates($id, $date, $userDate) {
        $sql = "select count(*) as total from reservation where id_book= {$id} and takenDate between '{$date}' and '{$userDate}';";
        $sqlCopy = "select count(*) as totalCopy from copy where id_book= {$id};";

        $rescopy = $this->db->query($sqlCopy);
        $countcopy = $rescopy->fetch_assoc();

        $res = $this->db->query($sql);

        $count = $res->fetch_assoc();

        if ($count['total']<$countcopy['totalCopy']) {
            return true;
        } else {
            return false;
        }
    }

    function checkreserve($dates, $id) {

        $date = new DateTime($dates);
        $userDate = $date->format('Y-m-d');

        $dateaux = new DateTime($dates);

        $date->sub(new DateInterval("P21D"));
        $userDateLess20 = $date->format('Y-m-d');

        $dateaux->add(new DateInterval('P21D'));
        $userDateAdd20 = $dateaux->format('Y-m-d');

        $result1 = $this->checkDates($id,$userDateLess20,$userDate);
        $result2 = $this->checkDates($id,$userDateAdd20, $userDate);

        if($result1 && $result2){
            // Create Reserve
            $this->insertReserve($id, $userDate);
        }else{
            $_SESSION['date_reserve'] = "failed";
            header('location:processBook.php?id='.$id.'&name='.$_GET['name']);
        }
    }
}