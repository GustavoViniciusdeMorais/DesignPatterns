<?php

namespace DesignPatterns\Memento;

class Editor
{
    private $text;

    public function setText($text)
    {
        $this->text = $text;
    }

    public function createMemento()
    {
        return new EditorMemento($this, $this->text);
    }
}

class EditorMemento
{
    private $editor;

    public function __construct($editor, $text)
    {
        $this->editor = $editor;
        $this->text = $text;
    }

    public function restore()
    {
        $this->editor->setText($this->text);
    }
}

class UndoCommmand
{
    private $backUp = null;

    public function makeBackup($editor)
    {
        $this->backUp = $editor->createMemento();
    }

    public function undo()
    {
        if($this->backUp !== null){
            $this->backUp->restore();
        }
    }
}