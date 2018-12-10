<?php
/**
 * Created by PhpStorm.
 * User: diang
 */
if(!isset($_SESSION)) session_start();
require_once("LabelInput.php");
class ClassForm {
    private $action;
    private $button;
    private $buttonReset;
    private $labelinput = [];
    function __construct($action, $button, $buttonReset) {
        $this->action = $action;
        $this->button = $button;
        $this->buttonReset = $buttonReset;
    }

    function addField($name, $nameLabel, $type, $value, $anything) {
        $this->labelinput[] = new Labelinput($name, $nameLabel, $type, $value, $anything);
    }
    function paintLabelInput() {
        foreach ($this->labelinput as $label) {
            echo $label;
        }
    }
    function displayForm() {
        echo "<form action='".$this->action."' method='POST'>";
            $this->paintLabelInput();
            if (isset($_SESSION['admin']) && !isset($_SESSION['reserveToClient'])) {
                echo "<p><input type='radio' name='usertype' value='1'>User</p>";
                echo "<p><input type='radio' name='usertype' value='2'>Librarian</p>";
            }
            echo "<div class='form-group'>";
                if ($this->buttonReset != "") {
                    echo "<input type='submit' value='" . $this->button . "' class='btn btn-primary'/>";
                    echo "<input type='reset' value='" . $this->buttonReset . "' class='btn btn-default'/>";
                } else if($this->button != ""){
                    echo "<input type='submit' value='" . $this->button . "' class='btn btn-primary'/>";
                }
            echo "</div>";
        echo "</form>";
    }
}