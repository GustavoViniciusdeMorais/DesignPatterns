<?php

namespace GustavoVinicius\Patterns\PubSub;

require_once './vendor/autoload.php';

use GustavoVinicius\Patterns\PubSub\Component;
use GustavoVinicius\Patterns\PubSub\Dispatcher;

$dispatcher = Dispatcher::getInstance();

$componentA = new Component("a");
$componentB = new Component("b");
$componentC = new Component("c");

$dispatcher::subscribe($componentA, $componentB);
$dispatcher::subscribe($componentA, $componentC);

$dispatcher::publish($componentA);
