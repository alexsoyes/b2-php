<?php


interface Vehicule
{
    function run(): void;

}

class Motorbike implements Vehicule
{
    function run(): void
    {
        // TODO: Implement run() method.
    }
}

class Car implements Vehicule
{
    function run(): void
    {
        // TODO: Implement run() method.
    }
}

class TravelService
{
    static function userCanTravelWith(Vehicule $e)
    {
        $e-é>run();
    }
}

$car = new Car();
$motorbike = new Motorbike();

TravelService::userCanTravelWith($motorbike);
TravelService::userCanTravelWith($car);





















