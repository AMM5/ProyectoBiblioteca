<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
    define('DB_SERVER', 'LOCALHOST');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'Dequa16.');
    define('DB_NAME', 'library_bd');
class BD {
    public static function connect(){
        $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($db === false) {
            die("ERROR: Could not connect. " . $db->connect_error);
        }

        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>