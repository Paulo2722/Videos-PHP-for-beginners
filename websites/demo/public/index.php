<?php

session_start();

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class); // convierte namespaces a paths
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php');


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = str_replace('/index.php', '', $uri);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


/*
$id = $_GET['id'];
$query = "select * from posts where id = :id";

$posts = $db->query($query, [':id' => $id])->fetch();

dd($posts);
*/

/*
// Ejecutar la consulta
$statement = $db->query("SELECT * FROM posts");

// Obtener todos los registros
$posts = $statement->fetchAll();

foreach ($posts as $post) {
    echo "<li>" . htmlspecialchars($post['title']) . "</li>";
}



// Datos de conexión
$host = 'db';             // nombre del servicio MySQL en docker-compose
$db   = 'php_videos';
$user = 'root';           // el usuario root de MySQL
$pass = '1234';
$charset = 'utf8mb4';


class Database{
    public function query(){
        $dsn = "mysql:host=localhost;port=8080;dbname=php_videos;user=root;password=1234;charset=utf8mb4";
        
        $pdo = new PDO($dsn);

        $statement = $pdo->prepare("select * from posts");
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

$db = new Database();

$posts = $db->query();

foreach ($posts as $post) {
        echo "<li>" . htmlspecialchars($post['title']) . "</li>";
    }



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