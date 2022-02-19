<?php

require './Command/CommandAPIExample.php';

use DesignPatterns\BetterCommandExample\Invoker;
use DesignPatterns\BetterCommandExample\GetProductsCommand;

$invoker = new Invoker();
$command = new GetProductsCommand();
// echo $invoker->save(['name' => 'test', 'price' => 11]);

$invoker->setCommand($command);

$result = $invoker->executeCommand();

var_dump($result);