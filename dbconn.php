<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('sensorprojects-17392-firebase-adminsdk-mprm5-1e7dadfead.json')
    ->withDatabaseUri('https://sensorprojects-17392-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();