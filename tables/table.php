<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 23/11/2018
 * Time: 12:36
 */

class table {
    private $title;
    private $dbName;
    private $tableName;
    private $fields = array();
    private $files = array();

    function __destruct() {}

    function __construct($title,$fields) {
        $this->title=$title;
        $this->fields=$fields;
    }

    function paintTable() {

        // painting header and showing results
        echo "<h2 align = center>$this->title</h2><br>";
        echo "<table border = 1 align = center>
        <tr>";
        foreach ($this->fields as $value) {
            echo "<th>".$value."</th>";
        }
        echo "</tr>";
        echo "</table>";

    }
}