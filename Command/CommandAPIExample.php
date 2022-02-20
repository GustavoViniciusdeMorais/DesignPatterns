<?php

namespace DesignPatterns\BetterCommandExample;

require './Lib/MySimpleORM.php';

use DesignPatterns\Lib\ORM\Model;
use Exception;

class Invoker
{
    private $command;

    public function setCommand($command)
    {
        $this->command = $command;
    }

    public function executeCommand($data = null)
    {
        try {
            $this->command->withData($data);
            return $this->command->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
}

abstract class Command
{
    public $data;
    abstract public function execute();
    public function withData($data)
    {
        $this->data = $data;
    }
}

class SaveProductCommand extends Command
{
    public function execute()
    {
        $product = new Product();
        return $product->save($this->data);
    }
}

class GetProductsCommand extends Command
{
    public function execute()
    {
        $product = new Product();
        return $product->all();
    }
}

class GetProductByIDCommand extends Command
{
    public function execute()
    {
        $product = new Product();
        return $product->find($this->data);
    }
}

class Product extends Model
{
    protected $table = "products";
    protected $attributes = ['name', 'price'];
}