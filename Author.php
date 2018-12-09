<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 09/12/2018
 * Time: 10:08
 */

require_once 'BD/conexionBD.php';
class Author {
    private $id;
    private $name;
    private $surname;
    private $db;

    function __construct() {
        $this->db = BD::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /************ALL AUTHOR***************/
    function selectAllAuthor() {
        $sql = "SELECT * FROM authors;";

        $reserv = $this->db->query($sql);

        return $reserv;
    }
    /************SELECT AUTHOR***************/
    function selectAuthor() {
        $sql = "SELECT * FROM authors WHERE id = {$this->id}";

        $reserv = $this->db->query($sql);

        return $reserv->fetch_assoc();
    }
    /************UPDATE AUTHOR***************/
    function updateAuthor() {
        $sql = "UPDATE authors SET name_author = '{$this->name}', first_surname = '{$this->surname}'
                    WHERE id = $this->id;";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['updateAuthor'] = "completed";
            header("location:../authors/tableAuthors.php");
        } else {
            $_SESSION['updateAuthor'] = "failed";
            header("location:modifyauthor.php?id=$this->id");
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }

        mysqli_close($this->db);
    }

    /************INSERT AUTHOR***************/
    function insertAuthor() {
        $sql = "INSERT INTO authors VALUES (null, '$this->name', '$this->surname');";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['insertAuthor'] = "completed";
            header("location:../authors/tableAuthors.php");
        } else {
            $_SESSION['insertAuthor'] = "failed";
            header("location:addauthor.php");
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }

        mysqli_close($this->db);
    }

    /*************DELETE COPY*************/
    function deleteAuthor() {
        $sql = "DELETE FROM authors WHERE id={$this->id};";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['deleteAuthor'] = "completed";
        } else {
            $_SESSION['deleteAuthor'] = "failed";
        }
        header("location:../authors/tableAuthors.php");
        mysqli_close($this->db);
    }
}