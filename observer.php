<?php

require './Observer/observer.php';

use DesignPatterns\Observer\Editor;
use DesignPatterns\Observer\GustavoLog;
use DesignPatterns\Observer\ConcretEventManager;

if(!isset($argv[1])
    && !isset($argv[2])
){
    echo "Informe um nome de arquivo e um dado para escrever no arquivo\n";
    echo "Excemplo: file.txt texto\n\n";
    exit;
}

$logger = new GustavoLog();

$eventManager = new ConcretEventManager();
$eventManager->subscribe("open", $logger);
$eventManager->subscribe("wrote", $logger);

$editor = new Editor($eventManager);
$editor->openFile($argv[1]);
$editor->writeFile($argv[2]);