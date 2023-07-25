<?php

namespace GustavoVinicius\Patterns\Visitor\SON;

abstract class AbElement
{
    protected $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function accept(IVisitor $visitor)
    {
        $visitor->accept($this)->execute();
    }
}
