<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    public $connection;
    public $statement;

    public function __construct(array $config) {

        $dsn = 'mysql:' . http_build_query([
            'host' => $config['host'],
            'port' => $config['port'],
            'dbname' => $config['dbname'],
            'charset' => $config['charset']
        ], '', ';');

        $username = $config['username'];
        $password = $config['password'];

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("❌ Error en la conexión: " . $e->getMessage());
        }
    }

    // Método dinámico para ejecutar consultas
    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        
        $this->statement->execute($params);
        
        return $this;
    }

    public function get(){
        return $this->statement->fetchAll();
    }

    public function find(){

        return $this->statement->fetch();
        //$statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();
        
        if (! $result){
            abort();
        }

        return $result;
    }
}
