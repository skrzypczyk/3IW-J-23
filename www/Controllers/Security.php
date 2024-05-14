<?php
namespace App\Controller;
use App\Core\Security as Auth;
use App\Core\View;
use App\Models\Page;
use App\Models\User;

class Security{


    public function login(): void
    {
        //Je vérifie que l'utilisateur n'est pas connecté sinon j'affiche un message

        $security = new Auth();
        if($security->isLogged()){
            echo "Vous êtes déjà connecté";
        }else{
            echo "Se connecter";
        }


    }
    public function register(): void
    {

        $myPage = new Page();
        $myPage->setId(1);
        $myPage->setTitle("Ma super page seconde version");
        $myPage->setContent("Voici le contenu de ma page");
        $myPage->save();


        if(!empty($_POST))
        {
            $user = new User();
            $user->setId(1);
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            //Injecter le user en bdd
            $user->save();
        }

        $view = new View("Security/register");
        $view->render();
    }
    public function logout(): void
    {
        echo "Se déconnecter";
    }


}



















