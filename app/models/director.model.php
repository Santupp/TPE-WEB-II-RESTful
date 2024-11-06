<?php
require_once 'app/controllers/director.controller.php';
require_once 'app/views/director.view.php';
class DirectorModel
{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    function getDirectors() {
        $query = $this->db->prepare('SELECT * FROM directores');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function insertDirector($nombre) {

        $filePath = "images/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['input_name']['name'], PATHINFO_EXTENSION));

        move_uploaded_file($_FILES['input_name']['tmp_name'], $filePath);

        $query = $this->db->prepare('INSERT INTO directores (nombre, imagen) VALUES (?, ?)');
        $query->execute([$nombre, $filePath]);

        return $this->db->lastInsertId();
    }
    
    public function deleteDirector($id) {
        $query = $this->db->prepare('DELETE FROM directores WHERE id = ?');
        $query->execute([$id]);
    }

    function getDirector($id) {
        $query = $this->db->prepare('SELECT * FROM directores WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function updateDirector($directorId, $nombre) {
        $query = $this->db->prepare('UPDATE directores SET nombre = ? WHERE id = ?');
        $query->execute([$nombre, $directorId]);
    }
}
