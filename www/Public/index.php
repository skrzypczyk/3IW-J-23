<?php

//Lorsque on met dans l'url /login par exemple
//On récupère dans le fichier Routes.yaml le controller et l'action associée
//On fait une instance du controller ex: $controller = new Security();
//Et on appel l'action associée ex : $controller->login();
//Si je décide de remplacer dans le fichier routes.yaml /login par /se-connecter tout doit fonctionner
//Attention pensez à effectuer un maximum de vérification et d'afficher les erreurs s'il y en a, exemple le fichier Routes.yaml n'existe pas
// ou autre exemple le controller Security ne possède pas d'acion login
//Le résultat final dans notre exemple doit afficher "Se connecter" dans le navigateur ou alors afficher PAGE 404
