<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Home';

require 'views/index.view.php';