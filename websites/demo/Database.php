<?php

class Database {
    private $pdo;

    public function __construct() {
        $host = 'db';          // Contenedor MySQL en docker-compose
        $db   = 'php_videos';
        $user = 'root';
        $pass = '1234';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("❌ Error en la conexión: " . $e->getMessage());
        }
    }

    // Método dinámico para ejecutar consultas
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt; // devolvemos el statement para flexibilidad
    }
}
