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
    private $value;


    function __construct($name, $nameLabel,$type,$value) {
        $this->name = $name;
        $this->nameLabel = $nameLabel;
        $this->type = $type;
        $this->value = $value;
    }

    function __toString() {
        return "<label for='".$this->name."'> $this->nameLabel</label>"
            ."<input type='".$this->type."' name='".$this->name."' value='".$this->value."'/>";
    }
}