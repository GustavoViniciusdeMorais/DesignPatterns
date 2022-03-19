<?php

namespace DesignPatterns\State;

abstract class State
{
    public $document;
    public abstract function render();
    public abstract function publish();
}

class Published extends State
{

    public function __construct($document)
    {
        $this->document = $document;
        $this->document->setContent('At Publishing');
    }

    public function render()
    {
        return $this->document->getContent();
    }

    public function publish()
    {
        $this->document->setContent('Already Published');
        return $this->document->getContent();
    }
}

class Moderator extends State
{

    public function __construct($document)
    {
        $this->document = $document;
        $this->document->setContent('At Moderating');
    }

    public function render()
    {
        return $this->document->getContent();
    }

    public function publish()
    {
        $this->document->setContent('Published');
        $this->document->setState(new Published($this->document));
    }
}

class Draft extends State
{

    public function __construct($document)
    {
        $this->document = $document;
        $this->document->setContent('At Draft');
    }

    public function render()
    {
        return $this->document->getContent();
    }

    public function publish()
    {
        if($_SESSION['user'] === 'admin'){
            $this->document->setContent('Published');
            $this->document->setState(new Published($this->document));
        }else{
            $this->document->setContent('Moderating');
            $this->document->setState(new Moderator($this->document));
        }
    }
}

class InitialState extends State
{
    public function render()
    {
    //test
    }
    public function publish()
    {
    //test
    }
}

class Document
{
    private State $state;
    private $content;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function render()
    {
        return $this->state->render();
    }

    public function publish()
    {
        return $this->state->publish();
    }
}