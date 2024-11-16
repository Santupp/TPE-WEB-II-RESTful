<?php
require_once 'app/models/film.model.php';
require_once 'app/views/film.view.php';
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
            if(!$res->user) {
                return $this->view->response("No autorizado", 401);
            }
        $orderBy = $req->query->orderBy ?? false; // Si no se envía orderBy, se asigna false

        $films = $this->model->getFilms($orderBy);  // No es necesario el coalescing operator (??),
                                                    // se usa el query solamente para obtener
                                                    // parametros de la URL.
        if (!$films) {
            return $this->view->response("No se encontraron peliculas", 404);
        }
        return $this->view->response($films);
    }
    public function showFilm($req, $res)
    {
//          if(!$res->user) {
//             return $this->view->response("No autorizado", 401);
//          }
        $id = $req->params->id;
        $film = $this->model->getFilm($id);
        if (!$film) {
            return $this->view->response("No se encontro la pelicula", 404);
        }
        return $this->view->response($film);

    }
    public function updateFilm($req, $res) {
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

    // ↓ FALTA IMPLEMENTAR ↓  //





    public function addFilms() {
        foreach ($turnos as $turno){
            $masctota = $this -> model -> getMascota($turno -> id_mascota);
            $turno -> nombre_mascota  = $mascota -> $nombre;

        }



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//      Procesar los datos del formulario
            $nombre = $_POST['nombre'];
            $estreno = $_POST['estreno'];
            $genero = $_POST['genero'];
            $descripcion = $_POST['descripcion'];
            $director = $_POST['director'];

            if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                $resultado = $this->model->addFilm($nombre, $estreno, $genero, $director,$descripcion , $_FILES['input_name']['tmp_name']);
            } else {
                $resultado = $this->model->addFilm($nombre, $estreno, $genero, $director, $descripcion);
            }

//      Redirigir dependiendo del resultado
            if ($resultado) {
                header('Location: ' . BASE_URL . 'peliculas?mensaje=Película agregada con éxito');
            } else {
                header('Location: ' . BASE_URL . 'agregarPelicula?mensaje=Error al agregar la película');
            }
        }
        else {
//      Mostrar el formulario para agregar película
            $this->showAddFilmForm();
        }
    }
    public function showAddFilmForm() {
        $directors = $this->model->getDirectors();
        $this->view->showAddFilmForm($directors);
    }


    public function showFilmsByDirector($directorID) {
        $director = $this->model->getDirectorById($directorID);
        if (!$director) {
            $this->view->showError("Director no es valido.");
            return;
        }
        $peliculas = $this->model->getFilmsByDirector($directorID);
        $this->view->showFilmsByDirector($peliculas, $director);
    }


}