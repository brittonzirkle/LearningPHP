<?php

require_once 'VehicleList.php';

$vehicleList = new VehicleList();

$vehicle1 = new Vehicle();
$vehicle1->setMake('Ford');
$vehicle1->setModel('F150');

$vehicle2 = new Vehicle();
$vehicle2->setMake('Chevy');
$vehicle2->setModel('Silverado');

$vehicle3 = new Vehicle();
$vehicle3->setMake('Toyota');
$vehicle3->setModel('Tundra');

$vehicleList->add($vehicle1);
$vehicleList->add($vehicle2);
$vehicleList->add($vehicle3);

foreach ($vehicleList as $vehicle)
{
    echo "{$vehicle->getMake()} {$vehicle->getModel()}";
    echo "<br>";
    echo "<br>";
}