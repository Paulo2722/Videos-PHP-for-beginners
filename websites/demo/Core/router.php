<?php

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Elimina /index.php si aparece
$uri = str_replace('/index.php', '', $uri);

// Elimina extensión .php si el usuario la pone
$uri = str_replace('.php', '', $uri);



function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

routeToController($uri, $routes);