<!-- handleUpload.php -->
<?php
session_start();
include '../auth/config.php';

if ($_SESSION['role'] !== 'mahasiswa') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_SESSION['id_user'])) {
    die("User ID not set in session. Please log in again.");
}

echo "User ID: " . $_SESSION['id_user'] . "<br>"; // Debugging statement


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdf"])) {
    $mahasiswa_id = $_SESSION['id_user']; // Assuming you have user_id in session
    echo "Mahasiswa ID: " . $mahasiswa_id . "<br>"; // Debugging statement

    $target_dir = "../uploads/";
    $file_name = basename($_FILES["pdf"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual PDF or fake PDF
    if ($fileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
            // Insert file info into the database
            $sql = "INSERT INTO uploads (mahasiswa_id, file_name, upload_date) VALUES (?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $mahasiswa_id, $file_name);
            if ($stmt->execute()) {
                echo "The file " . htmlspecialchars($file_name) . " has been uploaded.";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>
