<?php

namespace DesignPatterns\Lib\ORM;

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
        return $this->db->query($query)->fetchArray();
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