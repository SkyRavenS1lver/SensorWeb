<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('sensor-web-da2ad-firebase-adminsdk-tj6ay-a20bd784fd.json')
    ->withDatabaseUri('https://sensor-web-da2ad-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();