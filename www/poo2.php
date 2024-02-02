<?php

class Vehicle
{
    public function speedUp(): void
    {
        $this->speed += $this->accelerate;
    }
}

class Car extends Vehicle {
    private $wheel = 4;
    protected $accelerate = 1;
    protected $speed = 0;
}
class Moto extends Vehicle {
    private $wheel = 2;
    protected $accelerate = 2;
    protected $speed = 0;

    public function speedUp(): void
    {
        $this->speed += $this->accelerate+1;
    }
}

$myCar = new Car();
$myCar->speedUp();
$myMoto = new Moto();
$myMoto->speedUp();
var_dump($myMoto);