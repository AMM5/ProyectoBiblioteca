<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 24/11/2018
 * Time: 16:37
 */
require_once 'BD/conexionBD.php';
if(!isset($_SESSION)) session_start();
class Books {
    private $id;
    private $isbn;
    private $name_book;
    private $category;
    private $description;
    private $author_id;
    private $db;

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
     * @return mixed
     */
    public function getNameBook()
    {
        return $this->name_book;
    }

    /**
     * @param mixed $name_book
     */
    public function setNameBook($name_book)
    {
        $this->name_book = $name_book;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    function __construct() {
        $this->db = BD::connect();
    }

/**************SEE BOOK INSIDE PAGE**********************/
    function seeBook() {
        $sql = "SELECT * from books ORDER BY RAND()";

        $registros = $this->db->query($sql);

        return $registros;

        mysqli_close($this->db);
    }
}