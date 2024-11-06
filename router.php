<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/controllers/film.controller.php';
//require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/director.controller.php';
// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'peliculas'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// Tabla de ruteo
// peliculas -> filmController->showFilms();
// showLogin -> authController->showLogin();
// login -> authController->login();
// logout -> authController->logout();
// agregarPelicula -> filmController->addFilms();
// verDirectores  -> directorController->showDirectores();
// verPeliculasDirector  -> filmController->showFilmsByDirector($directorId);
// agregarDirector  -> directorController->addDirector;
// eliminarDirector/:ID -> deleteDirector($id)

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);
switch ($params[0]) {
    case 'peliculas':
        $controller = new FilmController();
        $controller->showFilms();
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'pelicula':
        if (isset($params[1])) {
            $controller = new FilmController();
            $controller->showFilm($params[1]);
        }
        break;
    case 'agregarPelicula':
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->addFilms();
        break;
        case 'eliminarPelicula':
            sessionAuthMiddleware($res);
            if (isset($params[1])) {
                $controller = new FilmController();
                $controller->deleteFilm($params[1]);
            }
            break;
            case 'editarPelicula':
                sessionAuthMiddleware($res);
                if (isset($params[1])) {
                    $controller = new FilmController();
                    $controller->updateFilm($params[1]);
                }
                break;
    case 'verDirectores':
        $controller = new directorController();
        $controller->showDirectors();
        break;
    case 'verPeliculasDirector':
        if (isset($params[1])) {
            $controller = new filmController();
            $controller->showFilmsByDirector($params[1]); // Usar el segundo parámetro como el ID del director
        }
        break;
    case 'agregarDirector':
        sessionAuthMiddleware($res);

        $controller = new directorController();
        $controller->addDirector();
        break;
    case 'eliminarDirector':
        sessionAuthMiddleware($res);
        if (isset($params[1])) {
            $controller = new directorController();
            $controller->deleteDirector($params[1]);
        }
        break;
        case 'editarDirector':
            sessionAuthMiddleware($res);
            if (isset($params[1])) {
                $controller = new directorController();
                $controller->updateDirector($params[1]);
            }
            break;
    default:
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}
