<?php

namespace App\Core;

use App\Forms\Register;

class Form
{
    private $config;
    private $errors = [];
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

        $html = "";

        if(!empty($this->errors)){
            foreach ($this->errors as $error){
                $html .= "<li>".$error."</li>";
            }
        }


        $html .= "<form action='".$this->config["config"]["action"]."' method='".$this->config["config"]["method"]."'>";

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

    public function isSubmitted(): bool
    {
        if($this->config["config"]["method"] =="POST" && !empty($_POST)){
            return true;
        }else if($this->config["config"]["method"] =="GET" && !empty($_GET)){
            return true;
        }else{
            return false;
        }
    }

    public function isValid(): bool
    {
        //Est-ce que j'ai exactement le meme nb de champs
        if( count($this->config["inputs"]) != count($_POST) ){
            $this->errors[] = "Tentative de Hack";
        }

        foreach ($_POST as  $name=>$dataSent){
            //Est-ce qu'il s'agit d'un champ que je lui ai donné ?
            if(!isset($this->config["inputs"][$name])){
                $this->errors[] = "Tentative de Hack, le champs ".$name." n'est pas autorisé";
            }

            //Est ce que ce n'est pas vide si required
            if(isset($this->config["inputs"][$name]["required"]) && empty($dataSent) ){
                $this->errors[] = "Le champs ".$name." ne doit pas être vide";
            }

            //Est ce que le min correspond
            if(isset($this->config["inputs"][$name]["min"])
                && strlen($dataSent)<$this->config["inputs"][$name]["min"] ){
                $this->errors[] = $this->config["inputs"][$name]["error"] ;
            }

            //Est ce que le max correspond
            if(isset($this->config["inputs"][$name]["max"])
                && strlen($dataSent)>$this->config["inputs"][$name]["max"] ){
                $this->errors[] = $this->config["inputs"][$name]["error"] ;
            }

            //Est ce que la confirmation correspond
            if(isset($this->config["inputs"][$name]["confirm"]) && $dataSent != $_POST[$this->config["inputs"][$name]["confirm"]]){
                $this->errors[] = $this->config["inputs"][$name]["error"] ;
            }else{
                //Est ce que le format email est OK
                if($this->config["inputs"][$name]["type"]=="email" &&
                !filter_var($dataSent, FILTER_VALIDATE_EMAIL)){
                    $this->errors[] = "Le format de l'email est incorrect" ;
                }
                //Est ce que le format password est OK
                if($this->config["inputs"][$name]["type"]=="password" &&
                    (!preg_match("#[a-z]#",$dataSent)||
                    !preg_match("#[A-Z]#",$dataSent)||
                    !preg_match("#[0-9]#",$dataSent))
                ){
                    $this->errors[] = $this->config["inputs"][$name]["error"] ;
                }
            }


        }


        if(empty($this->errors))
        {
            return true;
        }else{
            return false;
        }
    }

}

