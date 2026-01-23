<?php
//make PHP strict
declare(strict_types=1); 
require_once "connect.php"; //include "connect.php"

//Creating a class show the info of the car
class Car{
    public string $brand; //Car's brand
    public string $model; //Car's model
    public int $year; //Model's release year

    //Constructer
    public function __construct(string $brand, string $model, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }
    
    //Call function
    public function getBadge(): string{
        return "Brand: {$this->brand} | Model: {$this->model} | Year: {$this->year}";
    }
}

//Creating an instance from the above class
$car = new Car("Koenigsegg", "Jesko Absolut", 2020);
echo $car->getBadge();