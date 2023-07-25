<?php

namespace GustavoVinicius\Patterns\Visitor\SON;

abstract class IVisitor
{
    protected $element;

    public function accept(AbElement $element)
    {
        $this->element = $element;
        return $this;
    }

    abstract public function execute();
}
