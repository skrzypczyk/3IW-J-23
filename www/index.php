<h1>Mon titre</h1>

<?php

    /*

        Convention de nommage :
            * CamelCase : Exemple $maSuperVariable
            * Pascale Case : Exemple MaClasse
            Snake Case : ma_propriete_css
            Kebab Case : mon-attribut
     */

    /*
        Variable :
            - CamelCase
            - Commence par un $
            - Pas de chiffre en 1er caractère
            - Logique
            - Anglais

        Déclaration : Déclaration automatique lors de l'affectation d'une valeur
        Typage : Automatique à l'affectation
            - String
            - Bool
            - Int
            - Float
            - Null
     */

    $firstname = "Yves";
    $firstname = &$newFirstname;
    $newFirstname = "Toto";
    echo $firstname;

    //Concaténation  : utilisation du .
    echo "Bonjour ".$firstname;

    $age = 18;
    $age++; //Post incrémentation
    ++$age; //Pre incrémentation
    $age += 1;
    $age = $age + 1;


    $age = 1;
    echo $age; //1
    echo $age +1; //2
    echo $age; //1
    echo $age++; //1
    echo $age; //2
    echo --$age; //1
    // echo ++$age++; //Erreur
    echo $age; //1


    $age = 18;
    //Conditions classiques
    if($age < 18){
        echo "Mineur";
    }elseif($age === 18){
        echo "Tout juste majeur";
    }else{
        echo "Majeur";
    }

    //Switch
    $gender = "Abonne";
    switch ($gender){
        case 'Admin':
            echo "Peut tout faire";
            break;
        case 'Editeur':
            echo "Peut modifier tous les contenus";
        case 'Auteur':
            echo "Peut modifier ses contenus";
        default:
            echo "Peut consulter le site";
            break;
    }

    //Condition ternaire
    $adult = true;
    if( $adult == true){
        echo "Ok";
    }else{
        echo "Nok";
    }
    //Instruction (condition)?"vrai":"faux";
    echo ( $adult == true )?"Ok":"Nok";

    $age = 20;
    $result = ($age >= 18)?"Ok":" Nok";

    //Le null coalescent
    $age = null;
    echo $age??"age inconnu";


    /*
     * Boucles
     *  - For : Nb d'itération connu
     *  - while : Nb d'itération inconnu
     *  - Do While : Au moins 1 itération
     *  - Foreach : Les tableaux
     */

    for($cpt=1; $cpt<=10; $cpt+=2)
    {
        echo $cpt;
    }


    $dice = rand(1,6);
    $cpt=1;
    while ($dice != 6){
        $dice = rand(1,6);
        $cpt++;
    }
    echo "il y a eu ".$cpt." tentatives pour tomber sur 6";


    $cpt=0;
    do{
        $dice = rand(1,9);
        $cpt++;
    }while($dice != 1);
    echo "il y a eu ".$cpt." tentatives pour tomber sur 6";


    //Tableaux
    //$myArray = array();
    $myArray = [];

    $students = ["Joey", "Ryan", "Amir"];
    echo $students[1]; //Ryan
    $students[5] = "Ndeye";
    echo "<pre>";
    var_dump($students);
    echo "</pre>";


    $student = ["Samba", [11, 13]];
    echo $student[0]." a une moyenne de " .($student[1][0]+$student[1][1])/2;

    $array = [
                0=>[],
                1=>[
                        0=>[],
                        1=>[
                            0=>[0=>"Jordan"],
                            1=>[]
                        ]
                    ],
                []
            ];
    echo $array[1][1][0][0];

    $student = ["lastname"=>"Pierre",4=>"test", "firstname"=>"Michel", "age"=>22];

    //Consigne : Afficher Prénom Nom a age ans
    echo $student["firstname"]." ".$student["lastname"]. " a ".$student["age"]. " ans";

    $student[] = 2;

    echo $student[5];




    $students = ["Joey", "Ryan", "Amir"];


    foreach ($students as $key=>$firstname) {
        echo  $key." => ".$firstname;
    }


    //Camel Case
    function helloWorld()
    {
        echo "Bonjour";
    }

    helloWorld();


    $firstname = "Yves";
    function helloYou(?String $firstname = null): void
    {
        echo "Bonjour ".$firstname;
    }

    //helloYou($firstname);
    helloYou();



    function cleanAndCheckFirstname .....



    $firstname = "Yves";
    cleanAndCheckFirstname($firstname);

    ?>



