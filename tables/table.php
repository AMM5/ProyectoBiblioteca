<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once '../BD/conexionBD.php';
if(!isset($_SESSION)) session_start();
class table {
    private $title;
    private $db;
    private $tableName;
    private $fields = array();
    private $files = array();

    function __destruct() {}

    function __construct($title,$fields,$files) {
        $this->db = BD::connect();
        $this->title=$title;
        $this->fields=$fields;
        $this->files=$files;
    }

/************TABLE USERS***************/
    function paintTableUser() {
        $sql = "SELECT * FROM users where type_of_user=1; ";

        $reserv = $this->db->query($sql);
        // painting header and showing results
        echo "<h2 align = center>$this->title</h2><br>";
        echo "<table border = 1 align = center>
        <tr>";
        foreach ($this->fields as $value) {
            echo "<th>".$value."</th>";
        }

        $rows = $reserv->num_rows;
        if ($rows == 0) {
            echo "There aren't any Users";
        }

        // loop to show results
        while ($row = $reserv->fetch_assoc()) {
            echo
                "<tr align = center><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['name_user']}</td>
                    <td>{$row['first_surname']}</td><td>{$row['second_surname']}</td><td>{$row['dni']}</td>
                    <td>{$row['email']}</td><td>{$row['phone_number']}</td><td><a href='../profile/{$this->files[0]}?id={$row['id']}'><img src='../img/modify.png'/></a></td>
                    <td><a href='../profile/{$this->files[1]}?id={$row['id']}'><img src='../img/delete.png'/></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";
    }

/*****************TABLE RESERV*********/
    function paintTableReserv() {
        $usr = $_SESSION['login'];
        /*$sql = "SELECT id_book_copy_fk, isbn, name_book, takenDate, returnDate from borrow join copy c on id_copy_fk=c.id JOIN books b on id_book=b.id
                  WHERE id_user = $usr->id;";*/
        $sql = "SELECT id_book, isbn, name_book, takenDate from reservation r join books b on r.id_book=b.id where r.id_user = $usr->id;";

        $reserv = $this->db->query($sql);
        // painting header and showing results
        echo "<h2 align = center>$this->title</h2><br>";
        echo "<table border = 1 align = center>
        <tr>";
        foreach ($this->fields as $value) {
            echo "<th>".$value."</th>";
        }

        $rows = $reserv->num_rows;
        if ($rows == 0) {
            echo "There aren't any books";
        }

        // loop to show results
        while ($row = $reserv->fetch_assoc()) {
            $takenDate = new DateTime($row['takenDate']);
            $takenDate->add(new DateInterval('P21D'));
            $userDateAdd20 = $takenDate->format('Y-m-d');

            echo
                "<tr><td><img src=\"../img/{$row['isbn']}.jpg\" width='110px' height='139.5px'/></td><td>".$row['name_book'].
                    "</td><td>".$row['takenDate']."</td><td>".$userDateAdd20."</td><td><a href='../books/SeeBook.php?id={$row['id_book']}'><img src='../img/browser.png'/></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";
    }
}