<?php

require_once __DIR__.'/../../vendor/autoload.php';

use GustavoVinicius\Patterns\Visitor\SON\StringElement;
use GustavoVinicius\Patterns\Visitor\SON\UpperVisitor;

$element = new StringElement();
$element->setValue('Gustavo Vinicius');
$element->accept(new UpperVisitor());
var_dump($element->getValue());
