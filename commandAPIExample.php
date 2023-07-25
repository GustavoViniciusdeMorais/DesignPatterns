<?php

require './Command/CommandAPIExample.php';

use DesignPatterns\BetterCommandExample\Invoker;
use DesignPatterns\BetterCommandExample\GetProductsCommand;
use DesignPatterns\BetterCommandExample\SaveProductCommand;
use DesignPatterns\BetterCommandExample\GetProductByIDCommand;

if(!isset($argv[1])){
    echo "Parâmetros necessários:\n\n";
    echo "1- Tipo de operação (insert, select, where) \n";
    exit;
}

function insertError(){
    echo "É necessário informar o nome do produto e valor\n\n";
    echo "Exemplo: php commandAPIExample.php insert celular 1200\n\n";
    exit;
}

$invoker = new Invoker();
$command = null;
$data = null;

if($argv[1] === 'insert'){
    if(isset($argv[2])
        && isset($argv[3])
    ){
        preg_match('/\w*/i', $argv[2], $name);
        preg_match('/\w*/i', $argv[3], $price);
        if(!empty($name)
            && !empty($price)
        ){
            $command = new SaveProductCommand();
            $data['name'] = $argv[2];
            $data['price'] = $argv[3];
        }else{
            insertError();
        }
    }else{
        insertError();
    }
}elseif($argv[1] === 'select'){
    $command = new GetProductsCommand();
}elseif($argv[1] === 'where'){
    $command = new GetProductByIDCommand();
    $data = $argv[2];
}

$invoker->setCommand($command);

$result = $invoker->executeCommand($data);

var_dump($result);