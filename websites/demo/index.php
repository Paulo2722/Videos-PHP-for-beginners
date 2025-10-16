<?php

require 'functions.php';
// require 'router.php';

// Datos de conexión
$host = 'db';             // nombre del servicio MySQL en docker-compose
$db   = 'php_videos';
$user = 'root';           // el usuario root de MySQL
$pass = '1234';
$charset = 'utf8mb4';

// DSN correcto
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $statement = $pdo->prepare("SELECT * FROM posts");
    $statement->execute();

    $posts = $statement->fetchAll();

    foreach ($posts as $post) {
        echo "<li>" . htmlspecialchars($post['title']) . "</li>";
    }

} catch (PDOException $e) {
    echo "❌ Error en la conexión: " . $e->getMessage();
}



/*
class Person
{
    public $name;
    public $age;

    public function breathe()
    {
        echo $this->name . ' is breathening';
    }
}

$person = new Person();

$person->name = 'Jhon Doe';
$person->age = 25;

$person->breathe();

*/