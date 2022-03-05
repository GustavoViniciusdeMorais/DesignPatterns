<?php

require './Memento/SimpleMemento.php';

use DesignPatterns\Memento\Editor;
use DesignPatterns\Memento\UndoCommmand;

$editor = new Editor;
$editor->setText($argv[1]);

$command = new UndoCommmand();
$backup = $command->makeBackup($editor);

$editor->setText($argv[2]);

$command->undo(); // the undo resets the editor state to the previous version

var_dump($editor);