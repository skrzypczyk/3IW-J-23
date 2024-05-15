<?php
namespace App\Core;
class View
{
    private $view;
    private $template;
    private $data = [];

    public function __construct(String $view, String $template="Front")
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function setView(String $view): void
    {
        $view = ucfirst(strtolower(trim($view)));
        if(!file_exists("../Views/".$view.".php")){
            die("La  vue ../Views/".$view.".php n'existe pas");
        }
        $this->view = $view;
    }

    public function setTemplate(String $template): void
    {
        $template = strtolower(trim($template));
        if(!file_exists("../Views/Templates/".$template.".php")){
            die("Le template ../Views/Templates/".$template.".php n'existe pas");
        }
        $this->template = $template;
    }


    public function assign($key, $value): void{
        $this->data[$key] = $value;
    }

    public function render(): void
    {
        extract($this->data);
        //echo "Le template c'est ".$this->template." et la vue ".$this->view;
        include "../Views/Templates/".$this->template.".php";
    }

}





















