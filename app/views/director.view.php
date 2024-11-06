<?php
    require_once 'app/controllers/director.controller.php';
    require_once 'app/models/director.model.php';
    class DirectorView {

        public function showDirectors($directores) {
            require_once 'templates/directors.phtml';
        }
        

        public function showError($error) {
            require 'templates/error.phtml';
        }
    
    }