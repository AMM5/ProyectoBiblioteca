<?php
/**
 * Created by PhpStorm.
 * User: diang
 * Date: 19/11/2018
 * Time: 16:54
 */

class LabelInput {
    private $name;
    private $nameLabel;
    private $type;

    function __construct($name, $nameLabel,$type) {
        $this->name = $name;
        $this->nameLabel = $nameLabel;
        $this->type = $type;
    }

    function __toString() {
        return "<label for='".$this->name."'> $this->nameLabel</label>"
            ."<br><input type='".$this->type."' name='".$this->name."'/><br>";
    }
}