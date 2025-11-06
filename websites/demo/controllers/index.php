<?php

$_SESSION['name'] = 'Paulo';

view("index.view.php", [
    'heading' => 'Home',
]);