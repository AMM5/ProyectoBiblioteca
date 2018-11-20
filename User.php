<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 20/11/2018
 * Time: 23:36
 */

class User {
    private $username;
    private $password;
    private $name_user;
    private $first_surname;
    private $second_surname;
    private $dni;
    private $email;
    private $phone_number;

    function __construct($username, $password, $name_user, $first_surname,
                         $second_surname, $dni, $email, $phone_number) {
        $this->username = $username;
        $this->password = $password;
        $this->name_user = $name_user;
        $this->first_surname = $first_surname;
        $this->second_surname = $second_surname;
        $this->dni = $dni;
        $this->email = $email;
        $this->phone_number = $phone_number;
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
        $this->password = $password;
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

    function insertDate() {
        require_once ("BD/conexionBD.php");

        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($mysqli === false) {
            die("ERROR: Could not connect. ".$mysqli->connect_error);
        }

        $sql = "INSERT INTO users VALUES (null, '$this->username', '$this->password', '$this->name_user', '$this->first_surname', '$this->second_surname', '$this->dni', '$this->email', $this->phone_number, 1);";
        // $conexion->query($sentenciaSQL);
        if (mysqli_query($mysqli, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
    }
}