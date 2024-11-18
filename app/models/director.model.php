<?php
require_once 'app/controllers/director.api.controller.php';
class DirectorModel
{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    function getDirectors($orderBy = false, $order = null, $directorsPerPage = 10, $offset = 0) {
        $sql = 'SELECT * FROM directores';

        if($orderBy) {
            switch($orderBy) {
                case'id':
                    $sql .= ' ORDER BY id';
                    break;
                case 'nombre':
                    $sql .= ' ORDER BY nombre';
                    break;
                case 'nacimiento':
                    $sql .= ' ORDER BY nacimiento';
                    break;
            }
            //controla que se añada order solo si se especifica una columna para ordenar
            if ($order){
                $order = strtoupper($order);
                if ($order == 'DESC')
                    $sql .= ' DESC';
                elseif ($order == 'ASC')
                    $sql .= ' ASC';
            }
    
        }

        if (is_numeric($directorsPerPage) && $directorsPerPage > 0 && is_numeric($offset) && $offset >= 0) {
            $sql .= " LIMIT $directorsPerPage OFFSET $offset";
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function insertDirector($nombre, $nacimiento) {
        $query = $this->db->prepare('INSERT INTO directores (nombre, nacimiento) VALUES (?, ?)');
        $query->execute([$nombre, $nacimiento]);

        return $this->db->lastInsertId();
    }
    
    public function deleteDirector($id) {
        $query = $this->db->prepare('DELETE FROM directores WHERE id = ?');
        $query->execute([$id]);
    }

    function getDirectorById($id) {
        $query = $this->db->prepare('SELECT * FROM directores WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function updateDirector($directorId, $nombre, $nacimiento) {
        $query = $this->db->prepare('UPDATE directores SET nombre = ?, nacimiento = ? WHERE id = ?');
        $query->execute([$nombre, $nacimiento, $directorId]);
    }
}
