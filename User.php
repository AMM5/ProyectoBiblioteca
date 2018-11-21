<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
require_once 'BD/conexionBD.php';

class User {
    private $username;
    private $password;
    private $name_user;
    private $first_surname;
    private $second_surname;
    private $dni;
    private $email;
    private $phone_number;
    private $db;

    function __construct() {
        $this->db = BD::connect();
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getNameUser()
    {
        return $this->name_user;
    }

    /**
     * @param mixed $name_user
     */
    public function setNameUser($name_user)
    {
        $this->name_user = $name_user;
    }

    /**
     * @return mixed
     */
    public function getFirstSurname()
    {
        return $this->first_surname;
    }

    /**
     * @param mixed $first_surname
     */
    public function setFirstSurname($first_surname)
    {
        $this->first_surname = $first_surname;
    }

    /**
     * @return mixed
     */
    public function getSecondSurname()
    {
        return $this->second_surname;
    }

    /**
     * @param mixed $second_surname
     */
    public function setSecondSurname($second_surname)
    {
        $this->second_surname = $second_surname;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }
    /**************CHECKING USER***********/
    function checkUsername() {
        $sql = "select * from users where username = '{$this->username}';";
        $check = $this->db->query($sql);
        if ($check->num_rows == 1) {
            return true;
        }
        return false;
    }

    function checkUsers() {
        if ($this->checkUsername()) {

        }
    }

    function insertDate() {
        $sql = "INSERT INTO users VALUES (null, '$this->username', '$this->password', '$this->name_user', '$this->first_surname', '$this->second_surname', '$this->dni', '$this->email', $this->phone_number, 1);";

        if (mysqli_query($this->db, $sql)) {
            header("location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
        mysqli_close($this->db);
    }
}