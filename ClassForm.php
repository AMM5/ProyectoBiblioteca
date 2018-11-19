<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 19/11/2018
 * Time: 16:52
 */
require_once ("LabelInput.php");
class ClassForm {
    private $action;
    private $button;
    private $labelinput = [];
    function __construct($action, $button) {
        $this->action = $action;
        $this->button = $button;
    }

    function addField($name, $nameLabel, $type) {
        $this->labelinput[] = new Labelinput($name, $nameLabel, $type);
    }

    function displayForm() {
        echo "<form action='".$this->action."' method='POST'>";
         foreach ($this->labelinput as $label) {
             echo $label;
         }
        /*for ($i = 0; $i < sizeof($this->labelinput); $i++ ) {
            echo $this->labelinput[$i];
        }*/
        echo "<input type='submit' value='".$this->button."'";
        echo "</form>";
    }
}