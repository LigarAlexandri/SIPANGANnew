<?php
include __DIR__ . '/../../model/database.php';


// Inisialisasi koneksi ke database
$db = new Database();
$conn = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Dashboard dengan Sidebar'; ?></title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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



  </body>
</html>
