<?php

namespace DesignPatterns\Command;

interface Button
{
    public function setCommand(Command $command);
    public function runCommand();
}

class CopyButton implements Button
{
    public $command;

    public function setCommand(Command $command)
    {
        $this->command = $command;
    }

    public function runCommand()
    {
        return $this->command->execute();
    }
}

class Application{
    public $clipboard;
}

class Editor
{
    public $text;
    public function getSelection()
    {
        return "Fake selected text";
    }
}

abstract class Command
{
    protected $app;
    protected $editor;
    protected $backup;

    public function __construct(Application $app, Editor $editor)
    {
        $this->app = $app;
        $this->editor = $editor;
    }

    public function saveBackup()
    {
        $this->backup = $this->editor->text;
    }

    public function undo()
    {
        $this->editor->text = $this->backup;
    }

    abstract public function execute();
}

class CopyCommand extends Command
{
    public function execute()
    {
        $this->app->clipboard = $this->editor->getSelection();
        return true;
    }
}

class CommandHistory
{
    public $history = [];

    public function push(Command $command)
    {
        $this->history[] = $command;
    }
}