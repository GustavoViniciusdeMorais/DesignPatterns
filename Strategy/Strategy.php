<?php

namespace DesignPatterns\Strategy;

interface RouteStrategy
{
    public function buildRoute($pointA, $pointB);
}

class Navigator
{
    private $routeStrategy;

    public function __construct(RouteStrategy $routeStrategy)
    {
        $this->routeStrategy = $routeStrategy;
    }

    public function setStrategy(RouteStrategy $routeStrategy)
    {
        $this->routeStrategy = $routeStrategy;
    }

    public function buildRoute($pointA, $pointB)
    {
        return $this->routeStrategy->buildRoute($pointA, $pointB);
    }
}

class RoadStrategy implements RouteStrategy
{
    public function buildRoute($pointA, $pointB)
    {
        return "Faster road between {$pointA} and {$pointB} \n\n";
    }
}

class PublicTransportStrategy implements RouteStrategy
{
    public function buildRoute($pointA, $pointB)
    {
        return <<<mystring
        Best public transports between {$pointA} and {$pointB}: \n
        - Subway 123
        - Airplane ABC to ZXY
        \n
        mystring;
    }
}