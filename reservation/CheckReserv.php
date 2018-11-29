<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once '../BD/conexionBD.php';
class CheckReserv {
    private $isbn;
    private $copy = [];

    function __construct() {
        $this->db = BD::connect();
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return array
     */
    public function getCopy()
    {
        return $this->copy;
    }

    /**
     * @param array $copy
     */
    public function setCopy($copy)
    {
        $this->copy = $copy;
    }

    function checkCopy() {
        $sql = "SELECT id from copy WHERE id = (SELECT id FROM books WHERE isbn = $this->isbn)";

        $this->copy = $this->db->query($sql);

        mysqli_close($this->db);
    }
}