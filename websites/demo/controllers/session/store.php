<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// Validaciones
if (!Validator::email($email)) {
    $errors['email'] = 'Introduce un correo válido.';
}

if (!Validator::string($password, 1, 255)) {
    $errors['password'] = 'Introduce una contraseña.';
}

if (!empty($errors)) {
    return view('session/create.view.php', ['errors' => $errors]);
}

// Buscar usuario
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user && password_verify($password, $user['password'])) {
    // Credenciales correctas
    login($user);
    header('Location: /');
    exit();
} else {
    // Usuario o contraseña incorrectos
    $errors['login'] = 'Correo o contraseña incorrectos.';
    return view('session/create.view.php', ['errors' => $errors]);
}
