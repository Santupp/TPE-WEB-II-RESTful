<?php
    require_once 'app/models/director.model.php';
    class DirectorController {

        private $model;
        private $view;

        public function __construct() {
            $this->model = new DirectorModel();
            $this->view = new DirectorView();
        }

        public function showDirectors() {
            $directors = $this->model->getDirectors();
            $this->view->showDirectors($directors);
        }

        public function addDirector() {
            if (!isset($_POST['nombre']) || empty($_POST['nombre']) ) {
                return $this->view->showError('Falta completar el nombre');
            }
            $nombre = $_POST['nombre'];
            
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                $this->model->insertDirector($nombre,  $_FILES['input_name']['tmp_name']);
            } else {
                $this->model->insertDirector($nombre);
            }

            header('Location: ' . BASE_URL . 'verDirectores');
        }

        public function deleteDirector($id) {
            $director = $this->model->getDirector($id);
            if (!$director) {
                return $this->view->showError("No existe el director con id= $id");
            }
            $this->model->deleteDirector($id);
            header('Location: ' . BASE_URL . 'verDirectores');
        }
        public function updateDirector($directorId) {
            if (isset($_POST['nombre']) || !empty($_POST['nombre'])) {
                $nombre =  $_POST['nombre'];
                $this->model->updateDirector($directorId, $nombre);
            }
            header('Location: ' . BASE_URL . 'verPeliculasDirector/' . $directorId);
        }
    }
