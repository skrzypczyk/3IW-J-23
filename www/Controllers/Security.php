<?php
namespace App\Controller;

class Security{


    public function login(): void
    {
        //Je vérifie que l'utilisateur n'est pas connecté sinon j'affiche un message

        $security = new Security();
        if($security->isLogged()){
            echo "Vous êtes déjà connecté";
        }else{
            echo "Se connecter";
        }

    }
    public function register(): void
    {
        echo "S'inscrire";
    }
    public function logout(): void
    {
        echo "Se déconnecter";
    }


}