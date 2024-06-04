<!-- mahasiswaUpload.php -->
<?php
session_start();
if ($_SESSION['role'] !== 'mahasiswa') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF</title>
</head>
<body>
    <h2>Upload PDF</h2>
    <form action="handleUpload.php" method="POST" enctype="multipart/form-data">
        <label for="pdf">Select PDF to upload:</label>
        <input type="file" name="pdf" id="pdf" accept="application/pdf" required>
        <br><br>
        <button type="submit">Upload PDF</button>
    </form>
</body>
</html>
