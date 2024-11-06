<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        session_start();
        if (isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL);
            die();
        }
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login()
    {
        if (!isset($_POST['identifier']) || empty($_POST['identifier'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario o email');
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
        $identifier = $_POST['identifier'];
        $password = $_POST['password'];
        // Check if the identifier is an email or username
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL))
        {
            $userFromDB = $this->model->getUserByEmail($identifier);
        }
        else
        {
            $userFromDB = $this->model->getUserByUsername($identifier);
        }
        if ($userFromDB && password_verify($password, $userFromDB->password))
        {
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['EMAIL_USER'] = $userFromDB->email;
            $_SESSION['USERNAME_USER'] = $userFromDB->username;
            $_SESSION['LAST_ACTIVITY'] = time();


            header('Location: ' . BASE_URL);
        }
        else
        {

            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}

