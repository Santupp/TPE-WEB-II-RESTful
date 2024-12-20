<?php
require_once 'config.db.php';
class FilmModel extends ConfigModel
{


    public function getFilms($orderBy = 'id', $order = 'ASC', $filmsPerPage = 10, $offset = 0)
{
    // Definir las columnas válidas para ordenación
    $validColumns = ['id', 'nombre', 'fecha_estreno', 'genero', 'descripcion', 'id_director'];

    // Validar la columna por la cual ordenar
    if (!in_array($orderBy, $validColumns)) {
        $orderBy = 'id'; // Si la columna no es válida, usar 'id' por defecto
    }

    // Validar la dirección del orden
    $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

    // Construir la consulta SQL con ordenación y paginación
    $sql = "SELECT * FROM peliculas ORDER BY $orderBy $order LIMIT $filmsPerPage OFFSET $offset";

    // Preparar y ejecutar la consulta
    $query = $this->db->prepare($sql);
    $query->execute();

    // Retornar los resultados
    return $query->fetchAll(PDO::FETCH_OBJ);
}

    public function getFilm($id)
    {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);

    }
    public function addFilm($nombre, $estreno, $genero, $id_director, $descripcion) {
//  TODO: AGREGAR IMAGENES, no elimino las lineas comentadas para no perder el codigo

//        $filePath = "images/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['input_name']['name'], PATHINFO_EXTENSION));
//        move_uploaded_file($_FILES['input_name']['tmp_name'], $filePath);
            $query = $this->db->prepare('INSERT INTO peliculas (nombre, fecha_estreno, genero, id_director, descripcion) VALUES (?, ?, ?,?, ?)');
            $query->execute([$nombre, $estreno, $genero,$id_director ,$descripcion]);


//
//        $query = $this->db->prepare('INSERT INTO peliculas (nombre, fecha_estreno, genero, id_director, descripcion, imagen) VALUES (?, ?, ?, ?,?, ?)');
//        $query->execute([$nombre, $estreno, $genero,$id_director ,$descripcion, $filePath]);

        return $this->db->lastInsertId();
    }

    public function getFilmsByDirector($directorID) {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_director = ?');
        $query->execute([$directorID]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDirectorNameById($directorID) {
        $query = $this->db->prepare('SELECT nombre FROM directores WHERE id = ?');
        $query->execute([$directorID]);
        return $query->fetch(PDO::FETCH_OBJ)->nombre;
    }
    public function getDirectorById($directorID) {
        $query = $this->db->prepare('SELECT * FROM directores WHERE id = ?');
        $query->execute([$directorID]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getDirectors() {
        $query = $this->db->prepare('SELECT * FROM directores');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteFilm($id) {
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id = ?');
        $query->execute([$id]);
    }
    public function updateFilm($id, $nombre, $fechaEstreno, $genero, $descripcion, $idDirector) {
        $query = $this->db->prepare('UPDATE peliculas SET nombre = ?, fecha_estreno = ?, genero = ?, descripcion = ?, id_director = ? WHERE id = ?');
        $query->execute([$nombre, $fechaEstreno, $genero, $descripcion, $idDirector, $id]);
    }
}