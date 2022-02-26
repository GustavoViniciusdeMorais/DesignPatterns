<?php

require './Mediator/Mediator.php';

use DesignPatterns\Mediator\Dialog;
use DesignPatterns\Mediator\Event;

$dialog = new Dialog();
$dialog->fieldName->emmit(new Event("Texto escrito"));
echo $dialog->textName->getValue()."\n\n";