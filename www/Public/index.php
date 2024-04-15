<?php
namespace App;

//Notre Autoloader
spl_autoload_register("myAutoloader");

function myAutoloader($class){
    //echo "L'autoloader se lance pour ".$class;
    if(file_exists("../Core/".$class.".php")){
        include "../Core/".$class.".php";
    }
}


//Lorsque on met dans l'url /login par exemple
//On récupère dans le fichier Routes.yaml le controller et l'action associée
//On fait une instance du controller ex: $controller = new Security();
//Et on appel l'action associée ex : $controller->login();
//Si je décide de remplacer dans le fichier routes.yaml /login par /se-connecter tout doit fonctionner
//Attention pensez à effectuer un maximum de vérification et d'afficher les erreurs s'il y en a, exemple le fichier Routes.yaml n'existe pas
// ou autre exemple le controller Security ne possède pas d'acion login
//Le résultat final dans notre exemple doit afficher "Se connecter" dans le navigateur ou alors afficher PAGE 404
//Consigne du TP : Envoyer par mail : y.skrzypczyk@gmail.com
//Objet du mail : "Projet TP ROUTING - GROUPE X"
//Contenu du mail copier coller le contenu du fichier index.php et la liste des membres du groupe
//A envoyer avant 13 le 01/03/2024-

//http://localhost/login
$uri = $_SERVER["REQUEST_URI"];
if(strlen($uri) > 1)
    $uri = rtrim($uri, "/");
$uriExploded = explode("?",$uri);
$uri = $uriExploded[0];


if(file_exists("../Routes.yml")) {
    $listOfRoutes = yaml_parse_file("../Routes.yml");
}else{
    header("Internal Server Error", true, 500);
    die("Le fichier de routing ../Routes.yml n'existe pas");
}

if(empty($listOfRoutes[$uri])) {
    header("Status 404 Not Found", true, 404);
    die("Page 404");
}

if(empty($listOfRoutes[$uri]["Controller"]) || empty($listOfRoutes[$uri]["Action"]) ) {
    header("Internal Server Error", true, 500);
    die("Le fichier routes.yml ne contient pas de controller ou d'action pour l'uri :".$uri);
}

$controller = $listOfRoutes[$uri]["Controller"];
$action = $listOfRoutes[$uri]["Action"];




//include "../Controllers/".$controller.".php";
if(!file_exists("../Controllers/".$controller.".php")){
    die("Le fichier controller ../Controllers/".$controller.".php n'existe pas");
}
include "../Controllers/".$controller.".php";

if( !class_exists($controller) ){
    die("Le class controller ".$controller." n'existe pas");
}
$objetController = new $controller();

if( !method_exists($controller, $action) ){
    die("Le methode ".$action." n'existe pas dans le controller ".$controller);
}
$objetController->$action();









