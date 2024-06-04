<?php
// Include database connection
include __DIR__ . '/../../model/database.php';

// Initialize connection to the database
$db = new Database();
$conn = $db->getConnection();

// Define variables to store form input
$nim = $nama = $jenis_kelamin = $id_prodi = $id_fakultas = '';
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $nim = trim($_POST["nim"]);
    $nama = trim($_POST["nama"]);
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $id_prodi = $_POST["id_prodi"];
    $id_fakultas = $_POST["id_fakultas"];

    // Insert data into the database
    $query = "INSERT INTO koordinator (nim, nama, jenis_kelamin, id_prodi, id_fakultas) 
              VALUES ('$nim', '$nama', '$jenis_kelamin', '$id_prodi', '$id_fakultas')";
    if (mysqli_query($conn, $query)) {
        // Redirect to mahasiswa.php after successful insertion
        header("Location: mahasiswa.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Akun Mahasiswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_prodi">Jurusan:</label>
            <input type="text" class="form-control" id="id_prodi" name="id_prodi" required>
        </div>
        <div class="form-group">
            <label for="id_fakultas">Fakultas:</label>
            <input type="text" class="form-control" id="id_fakultas" name="id_fakultas" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    // Display error message if insertion fails
    if ($error) {
        echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
    }
    ?>
</div>
</body>
</html>
