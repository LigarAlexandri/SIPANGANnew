<?php
include __DIR__ . '/../../model/database.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'];
$query = "SELECT * FROM ruangan WHERE id_ruangan = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $lantai = $_POST['lantai'];
    $gedung = $_POST['gedung'];
    $fasilitas = $_POST['fasilitas'];
    $kondisi = $_POST['kondisi'];

    $query = "UPDATE ruangan SET kode_ruangan = '$kode', lantai = '$lantai', gedung = '$gedung', fasilitas = '$fasilitas', kondisi = '$kondisi' WHERE id_ruangan = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: ruangan.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Edit Ruangan'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Edit Ruangan</h2>
    <form method="post">
        <div class="form-group">
            <label>Kode Ruangan</label>
            <input type="text" name="kode" class="form-control" value="<?php echo $row['kode_ruangan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Lantai</label>
            <input type="text" name="lantai" class="form-control" value="<?php echo $row['lantai']; ?>" required>
        </div>
        <div class="form-group">
            <label>Gedung</label>
            <input type="text" name="gedung" class="form-control" value="<?php echo $row['gedung']; ?>" required>
        </div>
        <div class="form-group">
            <label>Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control" value="<?php echo $row['fasilitas']; ?>" required>
        </div>
        <div class="form-group">
            <label>Kondisi</label>
            <input type="text" name="kondisi" class="form-control" value="<?php echo $row['kondisi']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
