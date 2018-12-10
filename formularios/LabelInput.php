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
    private $anything;


    function __construct($name, $nameLabel,$type,$value, $anything) {
        $this->name = $name;
        $this->nameLabel = $nameLabel;
        $this->type = $type;
        $this->value = $value;
        $this->anything = $anything;
    }

    function __toString() {
        return "<div class='form-group'><label for='".$this->name."'> $this->nameLabel</label>"
            ."<input type='".$this->type."' name='".$this->name."' value='".$this->value."'$this->anything/></div>";
    }
}