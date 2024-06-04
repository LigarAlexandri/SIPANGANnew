<?php
require_once '../../controller/ruanganController.php';

// Assuming $ruanganController is an instance of RuanganController
$searchQuery = isset($_GET['cari']) ? $_GET['cari'] : "";
$ruanganController = new RuanganController();
$ruanganController->index(); // Call the index method to populate $result
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
                <a href="adminTU.php"><?php echo 'Beranda'; ?></a>
            </li>
            <li>
                <span class="material-symbols-outlined"><?php echo 'meeting_room'; ?></span>
                <a href="ruangan.php"><?php echo 'Ruangan'; ?></a>
            </li>
            <li>
                <span class="material-symbols-outlined"><?php echo 'Group'; ?></span>
                <a href="../auth/registerAkun.php"><?php echo 'Buat Akun Mahasiswa'; ?></a>
            </li>
            <li>
                <span class="material-symbols-outlined"><?php echo 'Group'; ?></span>
                <a href="adminVerif.php"><?php echo 'Verifikasi Ruangan'; ?></a>
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
                <a href="../logout.php"><?php echo 'Logout'; ?></a>
            </li>
            <hr>
        </ul>
    </aside>

    <div class="container">
        <div class="glass-rectangle">
            <div class="glass-rectangle-content">
                <div class="p-3" style="background: rgba(255, 255, 255, 0.2); border-radius: 10px;">
                    <h3 class="judul">Data Ruangan</h3>
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <button class="btn btn-success" onclick="window.location = 'ruanganTambah.php';"><?php echo 'Tambah'; ?></button>
                        </div>
                        <form class="d-flex" action="ruangan.php" method="GET">
                            <input type="text" class="form-control me-2" name="cari" placeholder="<?php echo 'Cari data disini...'; ?>" value="<?php echo $searchQuery; ?>" />
                            <button class="btn btn-primary" type="submit"><?php echo 'Cari'; ?></button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo 'No'; ?></th>
                                    <th scope="col"><?php echo 'Kode'; ?></th>
                                    <th scope="col"><?php echo 'Lantai'; ?></th>
                                    <th scope="col"><?php echo 'Gedung'; ?></th>
                                    <th scope="col"><?php echo 'Fasilitas'; ?></th>
                                    <th scope="col"><?php echo 'Kondisi'; ?></th>
                                    <th scope="col"><?php echo 'Opsi'; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($ruanganController->result)) {
                                    $result = $ruanganController->result;
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . $row['kode_ruangan'] . "</td>";
                                            echo "<td>" . $row['lantai'] . "</td>";
                                            echo "<td>" . $row['gedung'] . "</td>";
                                            echo "<td>" . $row['fasilitas'] . "</td>";
                                            echo "<td>" . $row['kondisi'] . "</td>";
                                            echo "<td>";
                                            echo "<a class='btn btn-warning btn-sm' href='ruanganEdit.php?id=" . $row['id_ruangan'] . "'>Edit</a> ";
                                            echo "<a class='btn btn-danger btn-sm' href='ruanganHapus.php?id=" . $row['id_ruangan'] . "'>Hapus</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Linking Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>