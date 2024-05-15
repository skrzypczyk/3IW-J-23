<?php

namespace App\Core;

use App\Forms\Register;

class Form
{
    private $config;
    public function __construct(String $name)
    {
        if(!file_exists("../Forms/".$name.".php")){
            die("Le form ".$name.".php n'existe pas dans le dossier ../Forms");
        }
        include "../Forms/".$name.".php";
        $name = "App\\Forms\\".$name;
        $this->config = $name::getConfig();

    }

    public function build(): string{
        $html = "<form action='".$this->config["config"]["action"]."' method='".$this->config["config"]["method"]."'>";

        foreach ($this->config["inputs"] as $name=>$input){
            $html .= "
                <input 
                    type='".$input["type"]."' 
                    name='".$name."' 
                    placeholder='".$input["placeholder"]."'
                    ". (($input["required"])?"required":"") ."
                    ><br>
            ";
        }


        $html .= "<input type='submit' value='".htmlentities($this->config["config"]["submit"])."'>";
        $html .= "</form>";

        return $html;
    }


}

