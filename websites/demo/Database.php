<?php

class Database {
    private $connection;

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
    public function query($query) {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}
