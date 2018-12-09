<?php
/**
 * Created by PhpStorm.
 * User: diang
 */

require_once 'BD/conexionBD.php';
class Copy {
    private $id;
    private $status;
    private $db;

    function __construct() {
        $this->db = BD::connect();
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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

/************UPDATE COPY***************/
    function updateCopy() {
        $sql = "UPDATE copy SET  status= '{$this->status}' WHERE id=$this->id;";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['updateCopy'] = "completed";
            header("location:copies.php");
        } else {
            $_SESSION['updateCopy'] = "failed";
            header("location:updatecopy.php?id=$this->id");
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
        mysqli_close($this->db);
    }

/************INSERT COPY***************/
    function insertCopy() {
        $sql = "INSERT INTO copy VALUES (null, $this->id, '$this->status');";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['insertCopy'] = "completed";
            header("location:../index.php");
        } else {
            $_SESSION['insertCopy'] = "failed";
            header("location:addcopies.php?id={$this->id}");
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }

        mysqli_close($this->db);
    }

/*************DELETE COPY*************/
    function deleteCopy() {
        $sql = "DELETE FROM copy WHERE id={$this->id};";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['deleteCopy'] = "completed";
            header("location:../index.php");
        } else {
            $_SESSION['deleteCopy'] = "failed";
            header("location:copies.php?id={$this->id}");
        }

        mysqli_close($this->db);
    }


}