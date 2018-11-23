<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 19/11/2018
 * Time: 16:52
 */
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

    function addField($name, $nameLabel, $type, $value) {
        $this->labelinput[] = new Labelinput($name, $nameLabel, $type, $value);
    }

    function displayForm() {
        echo "<form action='".$this->action."' method='POST'>";
            foreach ($this->labelinput as $label) {
                echo $label;
            }
            echo "<div class='botones'>";
                if ($this->buttonReset != "") {
                    echo "<input type='submit' value='" . $this->button . "'/>";
                    echo "<input type='reset' value='" . $this->buttonReset . "'/>";
                } else {
                    echo "<input type='submit' value='" . $this->button . "'/>";
                }
            echo "</div>";
        echo "</form>";
    }
}