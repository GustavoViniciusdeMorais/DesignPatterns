<?php

require './Strategy/Strategy.php';

use DesignPatterns\Strategy\Navigator;
use DesignPatterns\Strategy\PublicTransportStrategy;
use DesignPatterns\Strategy\RoadStrategy;

if(isset($argv[1])
    && isset($argv[2])
){
    $pointA = $argv[1];
    $pointB = $argv[2];
    $roadStrategy = new RoadStrategy();
    $publicStrategy = new PublicTransportStrategy();
    $navigator = new Navigator($roadStrategy);
    echo $navigator->buildRoute($pointA, $pointB);
    $navigator->setStrategy($publicStrategy);
    echo $navigator->buildRoute($pointA, $pointB);
}else{
    echo "You shold pass the point A and B to run this code";
    exit;
}