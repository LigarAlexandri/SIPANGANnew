<?php
session_start();

require_once 'model/user.php';
require_once 'model/database.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->password = $_POST['password'];

            if ($this->user->authenticate()) {
                $_SESSION['username'] = $this->user->username;
                $_SESSION['nama'] = $this->user->nama;
                header("Location: index.php");
            } else {
                echo "Invalid username or password.";
            }
        }
    }
}

$controller = new AuthController();
$controller->login();
?>
