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
    function paintTableLibrarian() {
        $sql = "SELECT * FROM users where type_of_user=2; ";

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
                    <td>{$row['email']}</td><td>{$row['phone_number']}</td>
                    <td><a href='../profile/{$this->files[0]}?id={$row['id']}'><img src='../img/modify.png'/></a></td>
                    <td><a href='../profile/{$this->files[1]}?id={$row['id']}'><img src='../img/delete.png'/></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";
    }
/**************TABLE AUTHORS***********/
    function paintTableAuthor() {
        $sql = "SELECT * FROM authors;";

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
            echo "There aren't any authors";
        }

        // loop to show results
        while ($row = $reserv->fetch_assoc()) {
            echo
            "<tr align = center><td>{$row['id']}</td><td>{$row['name_author']}</td><td>{$row['first_surname']}</td>
                    <td><a href='../authors/{$this->files[0]}?id={$row['id']}'><img src='../img/update.png'/></a></td>
                    <td><a href='../authors/{$this->files[1]}?id={$row['id']}'><img src='../img/delete.png'/></a></td>
             </tr>";
        }

        echo "</tr>";
        echo "</table>";
    }
/**************TABLE COPY**************/
    function paintTableCopy($ides) {
        $sql = "SELECT c.id, b.name_book, c.status FROM books b join copy c on b.id=c.id_book WHERE c.id_book={$ides}";

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
            echo "There aren't any copies";
        }

        // loop to show results
        while ($row = $reserv->fetch_assoc()) {
            echo
            "<tr align = center><td>{$row['id']}</td><td>{$row['name_book']}</td><td>{$row['status']}</td>
                    <td><a href='../copy/{$this->files[0]}?id={$row['id']}&status={$row['status']}'><img src='../img/update.png'/></a></td>
                    <td><a href='../copy/{$this->files[1]}?id={$row['id']}'><img src='../img/delete.png'/></a></td>
             </tr>";
        }

        echo "</tr>";
        echo "</table>";
    }

/************TABLE BOOKS***************/
    function paintTableBooks() {
        $sql = "SELECT b.*, a.name_author, a.first_surname FROM books b join authors a on b.author_id=a.id";

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
            "<tr align = center><td>{$row['id']}</td><td>{$row['isbn']}</td><td>{$row['name_book']}</td><td>{$row['category']}</td>
                    <td>{$row['description']}</td><td>{$row['name_author']}</td><td>{$row['first_surname']}</td>
                    <td><a href='../copy/{$this->files[0]}?id={$row['id']}'><img src='../img/browser.png'/></a></td>
                    <td><a href='../books/{$this->files[1]}?id={$row['id']}'><img src='../img/update.png'/></a></td>
                    <td><a href='../books/{$this->files[2]}?id={$row['id']}'><img src='../img/delete.png'/></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";
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
                    <td>{$row['email']}</td><td>{$row['phone_number']}</td>
                    <td><a href='../reservation/{$this->files[2]}?id={$row['id']}'><img src='../img/browser.png'/></a></td>
                    <td><a href='../profile/{$this->files[0]}?id={$row['id']}'><img src='../img/modify.png'/></a></td>
                    <td><a href='../profile/{$this->files[1]}?id={$row['id']}'><img src='../img/delete.png'/></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";
    }

/*****************TABLE RESERV*********/
    function paintTableReserv() {
        $ids = -1;
        if (isset($_GET['id'])) {
            $ids = $_GET['id'];
        } else if(isset($_SESSION['librarian']) || isset($_SESSION['admin'])) {
            $sql = "SELECT id_book, isbn, name_book, takenDate from reservation r join books b on r.id_book=b.id;";
        } else {
            $usr = $_SESSION['login'];
            $ids = $usr->id;
        }

        if ($ids != -1) {
            $sql = "SELECT id_book, isbn, name_book, takenDate from reservation r join books b on r.id_book=b.id where r.id_user = $ids;";
        }

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
                    "</td><td>".$row['takenDate']."</td><td>".$userDateAdd20."</td><td><a href='../books/{$this->files[0]}?id={$row['id_book']}'><img src='../img/browser.png'/></a></td></tr>";
        }

        echo "</tr>";
        echo "</table>";
    }
}