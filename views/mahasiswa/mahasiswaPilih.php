<?php
session_start();
include '../auth/config.php';

// Ensure the user is logged in and is a 'mahasiswa'
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'mahasiswa') {
    header("Location: ../login.php");
    exit();
}

// Fetch available rooms from the database
$sql = "SELECT id_ruangan, kode_ruangan FROM ruangan WHERE kondisi = 'KOSONG'";
$result = $conn->query($sql);

$rooms = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdf"])) {
    if (!isset($_SESSION['id_user'])) {
        echo "User ID not set in session. Please log in again.";
        exit();
    }
    
    $mahasiswa_id = $_SESSION['id_user'];
    $id_ruangan = $_POST['id_ruangan'];
    $target_dir = "../uploads/";
    $file_name = basename($_FILES["pdf"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a PDF
    if ($fileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if file upload is okay
    if ($uploadOk == 1 && move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
        // Insert upload details into the database
        $sql = "INSERT INTO uploads (mahasiswa_id, id_ruangan, file_name, upload_date, verified) VALUES (?, ?, ?, NOW(), 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $mahasiswa_id, $id_ruangan, $file_name);
        if ($stmt->execute()) {
            echo "File telah dikirim, silahkan menunggu email notifikasi persetujuan.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam ruangan</title>
    <link rel="stylesheet" href="../style/pilih.css">
</head>
<body>
<div class="container">
    <h2>Pinjam ruangan</h2>
    <form action="mahasiswaPilih.php" method="post" enctype="multipart/form-data">
        <label for="id_ruangan">Select Room:</label>
        <select id="id_ruangan" name="id_ruangan" required>
            <?php foreach ($rooms as $room): ?>
                <option value="<?php echo $room['id_ruangan']; ?>"><?php echo $room['kode_ruangan']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="pdf">Upload SURAT PEMINJAMAN:</label>
        <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
