<?php
include __DIR__ . '/../../model/database.php';

// Inisialisasi koneksi ke database
$db = new Database();
$conn = $db->getConnection();

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to create Mahasiswa
function createMahasiswa($nim, $nama, $jenis_kelamin, $id_prodi, $id_fakultas, $username, $password) {
    global $conn;
    $username = sanitize_input($username);
    $password = password_hash(sanitize_input($password), PASSWORD_DEFAULT);
    $query = "INSERT INTO koordinator (nim, nama, jenis_kelamin, id_prodi, id_fakultas, username, password) VALUES ('$nim', '$nama', '$jenis_kelamin', '$id_prodi', '$id_fakultas', '$username', '$password')";
    return mysqli_query($conn, $query);
}

// Function to update Mahasiswa
function updateMahasiswa($id_koordinator, $nim, $nama, $jenis_kelamin, $id_prodi, $id_fakultas) {
    global $conn;
    $query = "UPDATE koordinator SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', id_prodi='$id_prodi', id_fakultas='$id_fakultas' WHERE id_koordinator='$id_koordinator'";
    return mysqli_query($conn, $query);
}

// Function to delete Mahasiswa
function deleteMahasiswa($id_koordinator) {
    global $conn;
    $query = "DELETE FROM koordinator WHERE id_koordinator='$id_koordinator'";
    return mysqli_query($conn, $query);
}

// Ambil data dari database
$query = "SELECT * FROM koordinator";
$result = mysqli_query($conn, $query);

// Initialize $no
$no = 1;
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
            <div class="p-3 background: rgba(255, 255, 255, 0.2); rounded">
                <h3 class="judul">Data Akun Mahasiswa</h3>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <button class="btn btn-success"
                                onclick="window.location = 'mahasiswaTambah.php';"><?php echo 'Buat Akun Mahasiswa'; ?></button>
                    </div>
                    <form class="d-flex">
                        <input type="text" class="form-control me-2" name="cari"
                               placeholder="<?php echo 'Cari data disini...'; ?>" />
                        <button class="btn btn-primary" type="submit"><?php echo 'Cari'; ?></button>
                    </form>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Fakultas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if $result is not null
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($erow = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$erow['nim'].'</td>
                                        <td>'.$erow['nama'].'</td>
                                        <td>'.$erow['jenis_kelamin'].'</td>
                                        <td>'.$erow['id_prodi'].'</td>
                                        <td>'.$erow['id_fakultas'].'</td>
                                        <td>
                                            <a href="mahasiswaEdit.php?id_koordinator='.$erow['id_koordinator'].'" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="koordinator data.php?aksi=delete&id_koordinator='.$erow['id_koordinator'].'" onclick="return confirm(\'Anda yakin akan menghapus data '.$erow['nama'].'?\')" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>';
                                $no++;
                            }
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
