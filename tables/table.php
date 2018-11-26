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

    function __construct($title,$fields) {
        $this->db = BD::connect();
        $this->title=$title;
        $this->fields=$fields;
    }

    function paintTable() {
        $usr = $_SESSION['login'];
        $sql = "SELECT isbn, name_book, takenDate, returnDate from borrow join copy c on id_copy_fk=c.id JOIN books b on id_book=b.id 
                  WHERE id_username = $usr->id;";

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
            echo
                "<tr><td><img src=\"../img/{$row['isbn']}.jpg\" width='110px' height='139.5px'/></td><td>".$row['name_book']."</td><td>".$row['takenDate']."</td><td>".$row['returnDate']."</td><td><a href='#'></a></td><td><a href='#'></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";

    }
}