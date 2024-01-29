<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');

$path = parse_url($path, PHP_URL_PATH);


Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('Main', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('err404', 'ErrorController');
Routing::get('newIncident', 'ProjectController');
Routing::post('login', 'SecurityController');
Routing::post('addIncident','ProjectController');
Routing::post('register', 'SecurityController');
Routing::get('logout','SecurityController');
Routing::get('map','MapController');
Routing::get('Incidents','MapController');



Routing::run($path);
