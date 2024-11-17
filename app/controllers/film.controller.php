<?php
require_once 'app/models/film.model.php';
require_once 'app/views/json.view.php';
class   FilmController
{
    private $model;
    private $view;


    public function __construct()
    {
        $this->model = new FilmModel();
        $this->view = new JSONView();
    }
    public function showFilms($req, $res)
    {
        //if (!$res->user) return $this->view->response("No autorizado", 401);

        $orderBy = $req->query->orderBy ?? 'id'; // Default order by 'id'
        $order = $req->query->order ?? 'ASC'; // Default order 'ASC'

        $filmsPerPage = 10;
        if (isset($req->query->filmsPerPage)) {
            $filmsPerPage = $req->query->filmsPerPage;
        }
        $page = 1;
        if (isset($req->query->page)) {
            $page = $req->query->page;
        }
        if (!is_numeric($filmsPerPage) || !is_numeric($page)) {
            return $this->view->response("Parámetros inválidos", 400);
        }
        $offset = ($page - 1) * $filmsPerPage;

        $films = $this->model->getFilms($orderBy, $order, $filmsPerPage, $offset);
        if (!$films) {
            return $this->view->response("No se encontraron peliculas", 404);
        }
        return $this->view->response($films);
    }

    public function showFilm($req, $res)
    {
        if (!$res->user) return $this->view->response("No autorizado", 401);

        $id = $req->params->id;
        $film = $this->model->getFilm($id);
        if (!$film) {
            return $this->view->response("No se encontro la pelicula", 404);
        }
        return $this->view->response($film);

    }
    public function updateFilm($req, $res) {
        if (!isAdmin($res))
            return $this->view->response('Access denied.', 403);

        $id = $req->params->id;
        $film = $this->model->getFilm($id);
        if (!$film) {
            return $this->view->showError("No existe la pelicula con id= $id", 404);
        }
        if (empty($req -> body -> nombre)        || empty($req -> body -> fecha_estreno) ||
            empty($req -> body -> genero)        || empty($req -> body -> descripcion)   ||
            empty($req -> body -> director))
        {
            return $this->view->response("Faltan datos obligatorios", 400);
        }



        $nombre = $req -> body -> nombre;
        $fechaEstreno = $req -> body -> fecha_estreno;
        $genero = $req -> body -> genero;
        $descripcion = $req -> body -> descripcion;
        $idDirector = $req -> body -> director;


        $this->model->updateFilm($id, $nombre, $fechaEstreno, $genero, $descripcion, $idDirector);
        $film = $this->model->getFilm($id);
        return $this->view->response($film, 200);


    }
    public function deleteFilm($req, $res) {
        if (!isAdmin($res))
            return $this->view->response('Access denied.', 403);

        $id = $req->params->id;

        $film = $this->model->getFilm($id);
        if (!$film) {
            return $this->view->showError("No existe la pelicula con id= $id", 404);
        }

        $this->model->deleteFilm($id);
        $this->view->response("La tarea con el id=$id se eliminó con éxito", 200);
        // header('Location: ' . BASE_URL . 'verDirectores');
    }
    public function addFilm($req, $res){
        if (!isAdmin($res))
            return $this->view->response('Access denied.', 403);

        if (empty($req -> body -> nombre)           ||
            empty($req -> body -> fecha_estreno)    ||
            empty($req -> body -> genero)           ||
            empty($req -> body -> descripcion)      ||
            empty($req -> body -> director)
        ){
            return $this -> view -> response("Faltan completar datos para agregar la pelicula", 400 );
        }

        $nombre =        $req -> body -> nombre;
        $fecha_estreno = $req -> body -> fecha_estreno;
        $genero =        $req -> body -> genero;
        $director =      $req -> body -> director;
        $descripcion =   $req -> body -> descripcion;

        $id = $this -> model ->addFilm($nombre, $fecha_estreno, $genero, $director, $descripcion);

        if (!$id){
            return $this -> view ->response("Error al insertar la pelicula", 500 );
        }


        $film = $this -> model -> getFilm($id);
        return $this ->view->response($film, 200);

    }
}