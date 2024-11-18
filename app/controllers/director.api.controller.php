<?php
    require_once 'app/models/director.model.php';
    require_once 'app/views/json.view.php';
    class DirectorController {

        private $model;
        private $view;

        public function __construct() {
            $this->model = new DirectorModel();
            $this->view = new JSONView();
        }

        public function getDirectors($req, $res) {

            $orderBy = false;
            if (isset($req->query->orderBy)) {
                $orderBy = $req->query->orderBy;
            }

            $order = 'ASC';
            if (isset($req -> query -> order)) {
                $order = strtoupper($req->query->order);
                if ($order !== 'ASC' && $order !== 'DESC') { //Solo valores validos
                    $order = 'ASC';
                }
            }

            $directorsPerPage = 10;
            if (isset($req->query->directorsPerPage)) {
                $directorsPerPage = $req->query->directorsPerPage;
            }
            $page = 1;
            if (isset($req->query->page)) {
                $page = $req->query->page;
            }
            if (!is_numeric($directorsPerPage) || !is_numeric($page)) {
                return $this->view->response("Parámetros inválidos", 400);
            }
            $offset = ($page - 1) * $directorsPerPage;

            $directors = $this->model->getDirectors($orderBy, $order, $directorsPerPage, $offset);
            
            return $this->view->response($directors);
        }

        public function getDirector($req, $res){
            $id = $req->params->id;
            $director = $this -> model -> getDirectorById($id);
            if (!$director) {
                return $this->view->response("No se encontró el director con la id $id", 404);
            }
            return $this->view->response($director);
        }

        public function addDirector($req, $res) {
            if (empty($req->body->nombre) || empty($req->body->nacimiento)) {
                return $this->view->response('Faltan completar datos', 400);
            }
            $nombre = $req->body->nombre;
            $nacimiento = $req->body->nacimiento;
            $id = $this->model->insertDirector($nombre, $nacimiento);
            if (!$id) {
                return $this->view->response("Error al agregar el director", 500);
            }

            $director = $this->model->getDirectorById($id);
            return $this->view->response($director, 201);
        }

        public function deleteDirector($req, $res) {
            $id = $req->params->id;
            $director = $this -> model -> getDirectorById($id);
            if (!$director) {
                return $this->view->response("No se encontró el director con la id $id", 404);
            }
            $this->model->deleteDirector($id);
            $this->view->response("El director con el id $id fue eliminado");
        }
        public function updateDirector($req, $res) {
            if (!isAdmin($res)) {
                return $this->view->response('Access denied.', 401);
            }
            $id = $req->params->id;
            $director = $this -> model -> getDirectorById($id);
            if (!$director) {
                return $this->view->response("No se encontró el director con la id $id", 404);
            }
            if (empty($req->body->nombre) || empty($req->body->nacimiento)) {
                return $this->view->response('Faltan completar datos', 400);
            }
            $nombre = $req->body->nombre;
            $nacimiento = $req->body->nacimiento;

            $this->model->updateDirector($id, $nombre, $nacimiento);
            if (!isAdmin($res)) {
                return $this->view->response('Access denied.', 401);
            }
            $director = $this->model->getDirectorById($id);
            return $this->view->response($director, 200);
        }
    }
