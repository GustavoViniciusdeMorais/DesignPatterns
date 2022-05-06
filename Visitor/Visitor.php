<?php

interface Shape
{
	public function accept(Visitor $v);
}

interface Visitor
{
	public function visit(Shape $shape);
}

class Dot implements Shape
{
	public function accept(Visitor $v)
	{
		return $v->visit($this);
	}
}

class XMLExportVisitor implements Visitor
{
	public function visit(Shape $shape)
	{
		return "Dot exported as XML.\n\n";
	}
}

$dot = new Dot();
$xmlExport = new XMLExportVisitor();

echo $dot->accept($xmlExport);