<?php

class User{

    private string $firstname;
    private string $lastname;
    private string $pwd;

    public function __construct($firstname, $lastname)
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
    }


    public function setFirstname(string $firstname): void
    {
        $this->firstname  = ucwords(strtolower(trim($firstname)));
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname  = strtoupper(trim($lastname));
    }

    public function setPwd(string $pwd): void
    {
        $this->pwd  = password_hash($pwd, PASSWORD_DEFAULT);
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function getPwd(): string
    {
        return $this->pwd;
    }

    public function __toString(): string
    {
        return "Welcome ".$this->getLastname(). " ".$this->getFirstname(). " votre mot de passe hashé est ".$this->getPwd();
    }

}

$myUser = new User("jEAN yVes ", "SkrzyPCzyk");
//$myUser->setFirstname("jEAN yVes ");
//$myUser->setLastname("SkrzyPCzyk");
$myUser->setPwd("Test1234");


echo $myUser;



$myUser = new User("Maëckel ", "DAMATOR");
$myUser->setPwd("Test12345");
echo $myUser;