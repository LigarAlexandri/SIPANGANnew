<?php
include 'database.php';

// Inisialisasi koneksi ke database
$db = new Database();
$conn = $db->getConnection();

// Ambil data dari database
$query = "SELECT * FROM ruangan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Dashboard dengan Sidebar'; ?></title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- Linking Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<aside class="sidebar">
      <div class="logo">
        <img src="../images/logo1.png" alt="logo">
        <h2><?php echo 'SIPANGAN'; ?></h2>
      </div>
      <ul class="links">
        <h4><?php echo 'Sidebar'; ?></h4>
        <li>
        <span class="material-symbols-outlined"><?php echo 'meeting_room'; ?></span>
          <a href="ruangan.php"><?php echo 'Ruangan'; ?></a>
        </li>
        <li>
        <span class="material-symbols-outlined"><?php echo 'Group'; ?></span>
          <a href="mahasiswa.php"><?php echo 'Mahasiswa'; ?></a>
        </li>
        <li>
            <span class="material-symbols-outlined"><?php echo 'chat'; ?></span>
            <a href="komentar.php"><?php echo 'Komentar'; ?></a>
          </li>
        <li>
        <span class="material-symbols-outlined laporan"><?php echo 'assignment'; ?></span>
          <a href="laporan.php"><?php echo 'Laporan'; ?></a>
        </li>
        <li>
            <span class="material-symbols-outlined"><?php echo 'Logout'; ?></span>
            <a href="Main.php"><?php echo 'Logout'; ?></a>
          </li>
        <hr>
      </ul>
    </aside>


    <div class="container">
    <div class="glass-rectangle">
        <div class="glass-rectangle-content">
            <div class="p-3" style="background: rgba(255, 255, 255, 0.2); border-radius: 15px;">
                <h3 class="judul mb-4"><?php echo 'Edit Mahasiswa'; ?></h3>
                <form method="post" action="" enctype="multipart/form-data">
                    <fieldset>
                        <legend><?php echo 'Identitas :'; ?></legend>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="nama" placeholder="<?php echo 'Nama Lengkap'; ?>" required="">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="tempat_lahir" placeholder="<?php echo 'Tempat Lahir'; ?>" required="">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" name="tanggal_lahir" placeholder="<?php echo 'Tanggal Lahir (Tahun-Bulan-Tanggal)'; ?>" required="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <select name="jenis_kelamin" class="form-select" required="">
                                <option value=""><?php echo 'Jenis Kelamin'; ?></option>
                                <option value="laki-laki"><?php echo 'Laki-laki'; ?></option>
                                <option value="perempuan"><?php echo 'Perempuan'; ?></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="kelas" class="form-select" required="">
                                <option value=""><?php echo 'Kelas'; ?></option>
                                <option value="4A"><?php echo '4A'; ?></option>
                                <option value="4B"><?php echo '4B'; ?></option>
                                <option value="4C"><?php echo '4C'; ?></option>
                                <option value="4D"><?php echo '4D'; ?></option>
                                <option value="4E"><?php echo '4E'; ?></option>
                                <option value="4F"><?php echo '4F'; ?></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="id_fakultas" class="form-select" id="fakultas" required="">
                                <option value=""><?php echo 'Pilih Fakultas'; ?></option>
                                <?php
                                // Loop untuk opsi fakultas
                                $fakultas = array("Fakultas Teknik", "Fakultas Kedokteran", "Fakultas Ekonomi"); // Contoh data fakultas
                                foreach ($fakultas as $fak) {
                                    echo "<option value='$fak'>$fak</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="id_prodi" class="form-select" id="prodi" required="">
                                <option value=""><?php echo 'Pilih Program Studi'; ?></option>
                                <?php
                                // Loop untuk opsi program studi
                                $prodi = array("Teknik Informatika", "Teknik Elektro", "Kedokteran Umum"); // Contoh data program studi
                                foreach ($prodi as $pr) {
                                    echo "<option value='$pr'>$pr</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <button type="submit" name="simpan" class="btn btn-primary me-3" style="width: 100px;"><?php echo 'Simpan'; ?></button>
                            <button type="reset" class="btn btn-secondary" style="width: 100px;"><?php echo 'Batal'; ?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Linking Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
