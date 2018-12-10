<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
//require_once "'".URLs."BD/conexionBD.php'";
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


/**************MODIFY BOOK*******************************/
    function modifyBook() {
        $sql = "UPDATE books SET isbn='{$this->isbn}', name_book='{$this->name_book}', category='{$this->category}',
                  description='{$this->description}', author_id={$this->author_id}
                  WHERE id={$this->id};";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['updateBook'] = "completed";
            header("location:../books/tableBooks.php");
        } else {
            $_SESSION['updateBook'] = "failed";
            header("location:../books/modifybook.php?id=$this->id");
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }

        mysqli_close($this->db);
    }
/**************INSERT BOOK**********************/
    function insertBook() {
        $sql = "INSERT INTO books VALUES (null, '$this->isbn', '{$this->name_book}', '{$this->category}', '$this->description', $this->author_id);";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['addbook'] = "completed";
            header("location:../books/tableBooks.php");
        } else {
            $_SESSION['addbook'] = "failed";
            header("location:../books/addbooks.php");
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }

        mysqli_close($this->db);
    }
/**************SEE BOOK INSIDE PAGE**********************/
    function seeBook() {
        $sql = "SELECT * from books ORDER BY RAND()";

        $registros = $this->db->query($sql);

        return $registros;

        mysqli_close($this->db);
    }

/**************SEE A ONE BOOK**********************/
    function oneBook() {
        $sql = "SELECT * from books b join authors a on b.author_id=a.id WHERE b.id= $this->id";

        $register = $this->db->query($sql);

        return $register;

        mysqli_close($this->db);
    }

/**************DELEDTE BOOK**********************/
    function deleteBook() {
        $sql = "DELETE FROM books WHERE id={$this->id};";

        if (mysqli_query($this->db, $sql)) {
            $_SESSION['deleteUser'] = "completed";
            header("location:../books/tableBooks.php");
        } else {
            $_SESSION['deleteUser'] = "failed";
            header("location:../books/tableBooks.php");
        }
        mysqli_close($this->db);
    }
}