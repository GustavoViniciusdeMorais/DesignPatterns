<?php

interface Model
{
    public function setName(string $name);
    public function getName(): string;
}

interface FactoryModel
{
    public function factoryMethod(Model $model): Model;
}


class Person implements Model
{
    private $name;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class PersonFactory implements FactoryModel
{
    public function factoryMethod(Model $model): Model
    {
        $model->setName('Person');
        return $model;
    }
}

$personFactory = new PersonFactory();
$model = $personFactory->factoryMethod(new Person());
echo $model->getName() . "\n";
