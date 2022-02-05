<?php

require './Adapter/adapter.php';

if(!isset($argv[1])
    || !isset($argv[2])
){
    echo "Parâmetros necessários:\n\n";
    echo "1- file.txt\n";
    echo "2- 'texto de exemplo'\n";
    exit;
}


$fileSource = new FileDataSource($argv[1]);
$wrapper = new EncryptionDecorator($fileSource);
echo $wrapper->writeData($argv[2])."\n";
echo $wrapper->readData()."\n";