<?php

namespace DesignPatterns\Lib\ORM;
use Exception;
abstract class Model
{
    public $db;
    protected $table = null;
    protected $attributes = [];
    
    public function __construct()
    {
        // should be a database singleton class
        $this->db = new \SQLite3("./Command/gustavo");
    }

    public function save($data)
    {
        $values = $this->mountInsertQueryValues($data);
        $query = $this->mountQuery($this->table, $values);
        return $this->runQuery($query);
    }

    public function all()
    {
        $query = "SELECT * FROM {$this->table}";
        $result = $this->db->query($query);
        $data = [];
        while($row = $result->fetchArray()){
            $data[] = $row;
        }
        return $data;
    }

    public function find($id)
    {
        if(!isset($id)){
            throw new Exception("Necessário informar o ID para consulta");
        }
        $query = "SELECT * FROM {$this->table} WHERE rowid = :id;";
        $statment = $this->db->prepare($query);
        $statment->bindValue(':id', $id);
        $result = $statment->execute();
        $data = $result->fetchArray();
        $data = [
            "name" => $data['name'],
            "price" => $data['price']
        ];
        return json_encode($data);
    }

    public function mountInsertQueryValues($data)
    {
        $values = "";
        foreach($this->attributes as $attribute){
            if(is_numeric($data[$attribute])){
                $values .= $data[$attribute]." ,";
            }else{
                $values .= "'".$data[$attribute]."' ,";
            }
        }
        $values = substr($values, 0, -1);
        return $values;
    }

    public function mountQuery($table, $values)
    {
        $columns = "";
        foreach($this->attributes as $attribute){
            $columns .= $attribute." ,";
        }
        $columns = substr($columns, 0, -1);
        return "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
    }

    public function runQuery($query)
    {
        $result = $this->db->exec($query);
        if($result === true){
            return "Success";
        }else{
            return "Error";
        }
    }

    public function getTableName()
    {
        $tableName = static::class;
        $tableName = explode("\\", $tableName)[2];
        $tableName = strtolower($tableName)."s";
        return $tableName;
    }
}