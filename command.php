<?php

require './Command/Command.php';

use DesignPatterns\Command\Application;
use DesignPatterns\Command\CopyButton;
use DesignPatterns\Command\CopyCommand;
use DesignPatterns\Command\Editor;

$app = new Application();
$editor = new Editor;
$command = new CopyCommand($app, $editor);
$button = new CopyButton($command);

$button->setCommand($command);
$button->runCommand();

echo "Aplication clipboard content: ".$app->clipboard."\n\n";