<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 09/12/2018
 * Time: 19:59
 */

require_once 'BD/conexionBD.php';
if(!isset($_SESSION)) session_start();
class Borrow {
    private $id_copy;
    private $id_book;
    private $username;
    private $takenDate;
    private $returnDate;
    private $db;

    function __construct() {
        $this->db = BD::connect();
    }

    /**
     * @return mixed
     */
    public function getIdCopy()
    {
        return $this->id_copy;
    }

    /**
     * @param mixed $id_copy
     */
    public function setIdCopy($id_copy)
    {
        $this->id_copy = $id_copy;
    }

    /**
     * @return mixed
     */
    public function getIdBook()
    {
        return $this->id_book;
    }

    /**
     * @param mixed $id_book
     */
    public function setIdBook($id_book)
    {
        $this->id_book = $id_book;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getTakenDate()
    {
        return $this->takenDate;
    }

    /**
     * @param mixed $takenDate
     */
    public function setTakenDate($takenDate)
    {
        $this->takenDate = $takenDate;
    }

    /**
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * @param mixed $returnDate
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }

    function insertBorrow() {
        if (isset($_SESSION['admin']) || isset($_SESSION['admin'])) {
            $sqlInsert = "INSERT INTO borrow VALUES ($this->id_copy, $this->id_book, '$this->username', '$this->takenDate','$this->returnDate')";
            if (mysqli_query($this->db, $sqlInsert)) {
                $_SESSION['borrow'] = "completed";
                header("location:../index.php");
            } else {
                $_SESSION['borrow'] = "completed";
                echo "ERROR";
            }
        }
    }

    function checkBorrow() {
        if (isset($_SESSION['admin']) || isset($_SESSION['admin'])) {
            $sql = "select count(*) as total from borrow";
            if (mysqli_query($this->db, $sql)) {
                $_SESSION['borrow'] = "completed";
                header("location:../index.php");
            } else {
                $_SESSION['borrow'] = "failed";
                echo "ERROR";
            }
        }
    }
}