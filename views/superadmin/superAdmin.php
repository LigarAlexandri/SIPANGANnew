<?php
include __DIR__ . '/../../model/database.php';
include '../auth/middleware.php';

checkAuth();
checkRole('superadmin');


// Inisialisasi koneksi ke database
$db = new Database();
$conn = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo 'SUPERRRRR ADMIN'; ?></title>
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
        <a href="adminTU.php"><?php echo 'Beranda'; ?></a>
      </li>
      <li>
        <span class="material-symbols-outlined"><?php echo 'meeting_room'; ?></span>
        <a href="ruangan.php"><?php echo 'Buat akun admin TU'; ?></a>
      </li>
      <li>
        <span class="material-symbols-outlined"><?php echo 'Group'; ?></span>
        <a href="../auth/registerAkun.php"><?php echo 'Analisis pengguna'; ?></a>
      </li>
      <li>
        <span class="material-symbols-outlined"><?php echo 'Logout'; ?></span>
        <a href="../main.php"><?php echo 'Logout'; ?></a>
      </li>
      <hr>
    </ul>
  </aside>

  <div class="container">
    <div class="glass-rectangle">
      <div class="glass-rectangle-content">
        <div class="p-3 background: rgba(255, 255, 255, 0.2); rounded">
          <div class="d-flex justify-content-between mb-3">
            <h2>HALO SUPER ADMINNNN</h2>
        </div>
      </div>
    </div>
  </div>


</body>

</html>