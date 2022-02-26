<?php

namespace DesignPatterns\Mediator;

class Component
{
    protected $mediator;

    public function __construct(DefaultMediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function emmit(Event $event)
    {
        $this->mediator->notify($this, $event);
    }

    public function getClassName()
    {
        return substr(strrchr(static::class, "\\"), 1);
    }
}

interface DefaultMediator
{
    public function notify(Component $component,Event $event);
}

class Dialog implements DefaultMediator
{
    public $fieldName;
    public $textName;

    public function __construct()
    {
        $this->textName = new TextName($this);
        $this->fieldName = new FieldName($this);
    }

    public function notify(Component $component,Event $event)
    {
        $componentName = $component->getClassName();
        if($componentName === "FieldName"){
            $this->textName->setValue($event->getBody());
        }
    }
}

class Event
{
    private $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }
}

class FieldName extends Component{}

class TextName extends Component
{
    private $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}