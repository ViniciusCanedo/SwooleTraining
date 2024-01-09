<?php

namespace App\Server;

class Database
{
    private $table;
    private $connection;

    public function __construct($table)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $host = getenv('DB_HOST');
            $database = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $password = getenv('DB_PASSWORD');

            $this->connection = new \PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            exit('ERROR:'.$e->getMessage());
        }
    }

    private function execute($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);

            return $stmt;
        } catch (\PDOException $e) {
            exit('ERROR:'.$e->getMessage());
        }
    }

    public function insert($values)
    {
        $columns = array_keys($values);
        $binds = array_pad([], count($columns), '?');

        $query = 'INSERT INTO '.$this->table.'('.implode(',', $columns).') VALUES('.implode(',', $binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $columns = [], $join = null, $groupOrder = null, $limit = null)
    {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $columns = empty($columns) ? '*' : implode(", ", $columns); 
        $join = strlen($join) ? $join : '';
        $groupOrder = strlen($groupOrder) ? $groupOrder : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT ' .$columns. ' FROM ' . $this->table . ' ' .$join. ' ' .$where. ' ' .$groupOrder. ' ' .$limit;

        return $this->execute($query);
    }

    public function update($where, $set = null) 
    {
        $where = strlen($where) ? 'WHERE ' .$where : '';
        $set = strlen($set) ? 'SET ' . $set : ''; 

        $query = 'UPDATE ' .$this->table. ' ' .$set. ' ' .$where;
        
        $this->execute($query);

        return true;
    }

    public function delete($where)
    {
        $where = strlen($where) ? 'WHERE ' .$where : '';

        $query = 'DELETE FROM ' .$this->table. ' ' .$where;

        $this->execute($query);

        return true;
    }
}
