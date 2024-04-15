<?php
namespace App\Controller;
class Main
{
    public function home()
    {
        //Appeler un template Front et la vue Main/Home
        $view = new View("Main/aboutus", "Back");
        //$view->setView("Main/Home");
        //$view->setTemplate("Front");
        $view->render();
    }
    public function logout()
    {
        //Déconnexion
        //Redirection
    }


}