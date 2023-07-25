<?php

namespace GustavoVinicius\Patterns\Visitor\SON;

class UpperVisitor extends IVisitor
{
    public function execute()
    {
        $value = $this->element->getValue();
        $this->element->setValue(strtoupper($value));
        return true;
    }
}
