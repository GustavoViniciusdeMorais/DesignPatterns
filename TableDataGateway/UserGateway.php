<?php

namespace GustavoVinicius\Patterns\TableDataGateway;

class UserGateway
{
    protected $connection = null;

    public function __constcut()
    {
        $this->connection = "";
    }

    public function all()
    {
        $query = "SELECT id, name, email FROM users";
        return $this->connection->query($query);
    }

    public function findById($id = 1)
    {
        $query = "SELECT id, name, email FROM users WHERE id = {$id}";
        return $this->connection->query($query)->fetch();
    }
}
