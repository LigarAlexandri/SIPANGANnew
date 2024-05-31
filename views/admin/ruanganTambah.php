<?php
include __DIR__ . '/../../model/database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kode = $_POST['kode'];
  $lantai = $_POST['lantai'];
  $gedung = $_POST['gedung'];
  $fasilitas = $_POST['fasilitas'];
  $kondisi = $_POST['kondisi'];

  $query = "INSERT INTO ruangan (kode_ruangan, lantai, gedung, fasilitas, kondisi) VALUES ('$kode', '$lantai', '$gedung', '$fasilitas', '$kondisi')";
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
  <title><?php echo 'Tambah Ruangan'; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>

  <div class="container">
    <div class="glass-rectangle">
      <div class="glass-rectangle-content">
        <div class="p-3 rounded">
          <h3 class="judul">Tambah Ruangan</h3>
          <form method="post">
            <fieldset class="filset">
              <div class="mb-3">
                <label>Kode Ruangan</label>
                <input type="text" name="kode" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Lantai</label>
                <input type="text" name="lantai" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Gedung</label>
                <input type="text" name="gedung" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Fasilitas</label>
                <input type="text" name="fasilitas" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Kondisi</label>
                <select name="kondisi" class="form-select" required="">
                  <option value=""><?php echo 'Pilih Kondisi'; ?></option>
                  <option value="KOSONG"><?php echo 'Kosong'; ?></option>
                  <option value="TERISI"><?php echo 'Terisi'; ?></option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </fieldset> 
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>