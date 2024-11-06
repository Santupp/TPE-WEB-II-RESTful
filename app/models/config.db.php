<?php
require_once 'app/config.php';
class ConfigModel {
    protected $db;

    public function __construct() {
        // Establecemos la conexión a la base de datos utilizando las constantes del config.php
        $this->db = new PDO(
            "mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );

        // Llamamos a la función de auto despliegue
        $this->deploy();
    }
    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getUserByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE username = ?');
        $query->execute([$username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }


    // Desplegar la base de datos automáticamente si no existen tablas
    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();

        // Si no hay tablas, ejecutamos el SQL para crear la estructura de la base de datos
        if(count($tables) == 0) {
            $sql =  <<<END
            -- Tabla de categorías
            CREATE TABLE IF NOT EXISTS categorias (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100) NOT NULL,
                foto_url VARCHAR(255)
            );

            -- Tabla de películas
            CREATE TABLE IF NOT EXISTS peliculas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100) NOT NULL,
                fecha_estreno DATE NOT NULL,
                genero VARCHAR(50),
                id_categoria INT,
                FOREIGN KEY (id_categoria) REFERENCES categorias(id)
            );

            -- Tabla de directores
            CREATE TABLE IF NOT EXISTS directores (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100) NOT NULL,
                fecha_nacimiento DATE NOT NULL,
                nacionalidad VARCHAR(50)
            );

            -- Tabla de actores
            CREATE TABLE IF NOT EXISTS actores (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100) NOT NULL,
                fecha_nacimiento DATE NOT NULL,
                nacionalidad VARCHAR(50)
            );

            -- Tabla de relaciones entre películas y actores (relación muchos a muchos)
            CREATE TABLE IF NOT EXISTS pelicula_actor (
                id_pelicula INT,
                id_actor INT,
                PRIMARY KEY (id_pelicula, id_actor),
                FOREIGN KEY (id_pelicula) REFERENCES peliculas(id),
                FOREIGN KEY (id_actor) REFERENCES actores(id)
            );

            -- Tabla de usuarios administradores
            CREATE TABLE IF NOT EXISTS administradores (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL
            );
        END;
            $this->db->query($sql);  // Ejecuta el SQ de creación de tablas
        }
    }
}
?>
