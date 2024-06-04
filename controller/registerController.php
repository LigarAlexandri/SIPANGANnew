<?php
include_once __DIR__ . '/../model/database.php';

class RegisterController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($data) {
        $conn = $this->db->getConnection();

        $nama = mysqli_real_escape_string($conn, $data['nama']);
        $email = mysqli_real_escape_string($conn, $data['email']);
        $username = mysqli_real_escape_string($conn, $data['username']);
        $password = password_hash(mysqli_real_escape_string($conn, $data['password']), PASSWORD_BCRYPT);
        $role = mysqli_real_escape_string($conn, $data['role']);

        $query = "INSERT INTO user (nama, email, username, password, role) VALUES ('$nama', '$email', '$username', '$password', '$role')";

        if (mysqli_query($conn, $query)) {
            $this->sendWelcomeEmail($email, $username, $data['password']); // Send the welcome email
            header("Location: ../views/admin/adminTU.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    private function sendWelcomeEmail($email, $username, $password) {
        $subject = "Hasil Registrasi Akun Mahasiswa";
        $message_content = "Registrasi berhasil, berikut kredensial akun anda:";

        $message = "
        <html>
        <head>
        <title>$subject</title>
        </head>
        <body>
        <div style='background-color: #4287f5; padding: 20px; border-radius: 8px;'>
            <p style='font-weight: bold;'>Username: $username</p>
            <p style='font-weight: bold;'>Password: $password</p>
            <p style='margin-top: 20px;'>$message_content</p>
        </div>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($email, $subject, $message, $headers);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registerController = new RegisterController();
    $registerController->register($_POST);
}
?>
