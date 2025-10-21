<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Elimina /index.php si aparece
$uri = str_replace('/index.php', '', $uri);

// Elimina extensión .php si el usuario la pone
$uri = str_replace('.php', '', $uri);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);