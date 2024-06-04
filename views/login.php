<?php
session_start();
include 'auth/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['id_user'] = $user['id_user']; // Store user ID in session


            if ($user['role'] == 'admin') {
                header("Location: admin/adminTU.php");
                exit(); // Ensure script stops after redirect
            } elseif ($user['role'] == 'superadmin') {
                header("Location: superadmin/superAdmin.php");
                exit(); // Ensure script stops after redirect
            } else {
                header("Location: mahasiswa/mahasiswaBeranda.php");
                exit(); // Ensure script stops after redirect
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}
$conn->close();
?>
