<?php

require_once 'libs/response.php';
require_once 'libs/router.php';

require_once 'app/middlewares/jwt.auth.middleware.php';
require_once 'app/controllers/user.api.controller.php';
require_once 'app/controllers/film.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/director.controller.php';


// Tabla de ruteo
// peliculas -> filmController->showFilms();X
// showLogin -> authController->showLogin();
// login -> authController->login();
// logout -> authController->logout();
// agregarPelicula -> filmController->addFilms(); X
// verDirectores  -> directorController->showDirectores();
// verPeliculasDirector  -> filmController->showFilmsByDirector($directorId);
// agregarDirector  -> directorController->addDirector;
// eliminarDirector/:ID -> deleteDirector($id);
// editarDirector/:ID -> updateDirector($id);
// eliminarPelicula/:ID -> deleteFilm($id);
// editarPelicula/:ID -> updateFilm($id);


// Tabla de ruteo nueva
// GET /peliculas -> FilmController->showFilms();
// GET /peliculas/:id -> FilmController->showFilm($id);
// POST /peliculas/:id -> FilmController->addFilm($id);
// DELETE /peliculas/:id -> FilmController->deleteFilm($id);

//ENDPOINTS

// /peliculas?orderBy=asc OR desc -> FilmController->showFilms(); // ordena por nombre ascendentemente



$router = new Router();
$router -> addMiddleware(new JWTAuthMiddleware());

$router -> addRoute('peliculas', 'GET', 'FilmController', 'showFilms');
$router -> addRoute('peliculas/ordered', 'GET', 'FilmController', 'showFilms');
$router -> addRoute('peliculas/:id', 'GET', 'FilmController', 'showFilm');
$router -> addRoute('peliculas', 'POST', 'FilmController', 'addFilm');
$router -> addRoute('peliculas/:id', 'PUT', 'FilmController', 'updateFilm');
$router -> addRoute('peliculas/:id', 'DELETE', 'FilmController', 'deleteFilm');

$router -> addRoute('GET', 'showLogin', 'AuthController', 'showLogin');

$router->addRoute('usuarios/register', 'POST', 'UserApiController', 'register');
$router -> addRoute('usuarios/token'    ,            'GET',     'UserApiController',   'getToken');


$router -> route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

//
// base_url para redirecciones y base tag
// define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
//
//$res = new Response();
//
//$action = 'peliculas'; // accion por defecto si no se envia ninguna
//if (!empty( $_GET['action'])) {
//    $action = $_GET['action'];
//}

//// parsea la accion para separar accion real de parametros
//$params = explode('/', $action);
//switch ($params[0]) {
//    case 'peliculas':
//        $controller = new FilmController();
//        $controller->showFilms();
//        break;
//    case 'showLogin':
//        $controller = new AuthController();
//        $controller->showLogin();
//        break;
//    case 'login':
//        $controller = new AuthController();
//        $controller->login();
//        break;
//    case 'logout':
//        $controller = new AuthController();
//        $controller->logout();
//        break;
//    case 'pelicula':
//        if (isset($params[1])) {
//            $controller = new FilmController();
//            $controller->showFilm($params[1]);
//        }
//        break;
//    case 'agregarPelicula':
//        sessionAuthMiddleware($res);
//        $controller = new FilmController();
//        $controller->addFilms();
//        break;
//        case 'eliminarPelicula':
//            sessionAuthMiddleware($res);
//            if (isset($params[1])) {
//                $controller = new FilmController();
//                $controller->deleteFilm($params[1]);
//            }
//            break;
//            case 'editarPelicula':
//                sessionAuthMiddleware($res);
//                if (isset($params[1])) {
//                    $controller = new FilmController();
//                    $controller->updateFilm($params[1]);
//                }
//                break;
//    case 'verDirectores':
//        $controller = new directorController();
//        $controller->showDirectors();
//        break;
//    case 'verPeliculasDirector':
//        if (isset($params[1])) {
//            $controller = new filmController();
//            $controller->showFilmsByDirector($params[1]); // Usar el segundo parámetro como el ID del director
//        }
//        break;
//    case 'agregarDirector':
//        sessionAuthMiddleware($res);
//
//        $controller = new directorController();
//        $controller->addDirector();
//        break;
//    case 'eliminarDirector':
//        sessionAuthMiddleware($res);
//        if (isset($params[1])) {
//            $controller = new directorController();
//            $controller->deleteDirector($params[1]);
//        }
//        break;
//        case 'editarDirector':
//            sessionAuthMiddleware($res);
//            if (isset($params[1])) {
//                $controller = new directorController();
//                $controller->updateDirector($params[1]);
//            }
//            break;
//    default:
//        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
//        break;
//}
