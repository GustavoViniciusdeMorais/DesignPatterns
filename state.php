<?php

require './State/State.php';

use DesignPatterns\State\Document;
use DesignPatterns\State\Draft;
use DesignPatterns\State\Moderator;
use DesignPatterns\State\Published;
use DesignPatterns\State\InitialState;

if(!isset($argv[1])){
    echo "Pass a user type: admin or any other name.\n\n";
    exit;
}

session_start();
$_SESSION['user'] = $argv[1];

$initialState = new InitialState();

$document = new Document($initialState);
$draft = new Draft($document);
$document->setState($draft);
$document->publish();
echo "Document state: ".$document->getContent()."\n\n";
