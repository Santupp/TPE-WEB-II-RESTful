
<?php
require_once 'config.db.php';
class UserModel {
    private $config;

    public function __construct()
    {

    $this->config = new ConfigModel();
    }

    public function getUserByEmail($email)
    {
    return $this->config->getUserByEmail($email); // Delegate query to ConfigModel
    }
    public function getUserByUsername($username)
    {
    return $this->config->getUserByUsername($username); // Delegate query to ConfigModel
    }
    public function createUser($name, $email, $pass) {
        $this->config->createUser($name, $email, $pass); // Delegate query to ConfigModel
    }
}
