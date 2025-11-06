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
    $errors['email'] = 'Da una dirección de correo válida.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Da una contraseña de al menos 7 caracteres.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// Comprobar si el usuario ya existe
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    // Ya existe -> redirigir o mostrar error
    $errors['email'] = 'Este correo ya está registrado.';
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// Insertar nuevo usuario
$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

// Obtener usuario recién creado
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// Iniciar sesión automáticamente
(new \Core\Authenticator)->login($user);

redirect('/');
exit();
