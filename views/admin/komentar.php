<?php
include __DIR__ . '/../../model/database.php';

// Inisialisasi koneksi ke database
$db = new Database();
$conn = $db->getConnection();

// Ambil data dari database
$query = "SELECT * FROM komentar"; // Ubah dari 'ruangan' menjadi 'komentar'
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
            <div class="p-3" style="background: rgba(255, 255, 255, 0.2); border-radius: 10px;"> <!-- Perbaiki background dan border-radius -->
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <form class="d-flex">
                            <input type="text" class="form-control me-2" name="cari" placeholder="<?php echo 'Cari data disini...'; ?>" />
                            <button class="btn btn-primary" type="submit"><?php echo 'Cari'; ?></button>
                        </form>
                    </div>
                </div>
                <table class="table table-striped"> <!-- Ganti class menjadi "table table-striped" -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Komentar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Inisialisasi variabel nomor urut
                        while ($erow = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'.$no.'</td>';
                            echo '<td>'.$erow['kode_ruangan'].'</td>';
                            echo '<td>'.$erow['komentar'].'</td>';
                            echo '<td>
                                    <button class="btn btn-danger btn-sm">
                                        <a href="komentar.php?aksi=delete&id_komentar='.$erow['id_komentar'].'" onclick="return confirm(\'Anda yakin akan menghapus komentar data '.$erow['id_komentar'].'?\')" class="text-white">Hapus</a>
                                    </button>
                                  </td>';
                            echo '</tr>';
                            $no++; // Increment nomor urut
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Linking Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
