<?php

require_once 'libs/response.php';
require_once 'libs/router.php';

require_once 'app/middlewares/jwt.auth.middleware.php';
require_once 'app/controllers/user.api.controller.php';
require_once 'app/controllers/film.controller.php';
require_once 'app/controllers/director.controller.php';

$router = new Router();
$router -> addMiddleware(new JWTAuthMiddleware());

$router -> addRoute('peliculas', 'GET', 'FilmController', 'showFilms');
$router -> addRoute('peliculas/ordered', 'GET', 'FilmController', 'showFilms');
$router -> addRoute('peliculas/:id', 'GET', 'FilmController', 'showFilm');
$router -> addRoute('peliculas', 'POST', 'FilmController', 'addFilm');
$router -> addRoute('peliculas/:id', 'PUT', 'FilmController', 'updateFilm');
$router -> addRoute('peliculas/:id', 'DELETE', 'FilmController', 'deleteFilm');

$router -> addRoute('GET', 'showLogin', 'AuthController', 'showLogin');

$router -> addRoute('usuarios/register', 'POST', 'UserApiController', 'register');
$router -> addRoute('usuarios/token'    ,            'GET',     'UserApiController',   'getToken');


$router -> route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
