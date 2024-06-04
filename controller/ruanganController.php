<?php
include_once __DIR__ . '/../model/database.php';

class RuanganController {
    private $db;
    public $result;

    public function __construct() {
        $this->db = new Database();
    }

    public function index() {
        $conn = $this->db->getConnection();

        $searchQuery = "";
        if (isset($_GET['cari']) && $_GET['cari'] != "") {
            $searchQuery = $_GET['cari'];
            $query = "SELECT * FROM ruangan WHERE kode_ruangan LIKE '%$searchQuery%' OR lantai LIKE '%$searchQuery%' OR gedung LIKE '%$searchQuery%' OR fasilitas LIKE '%$searchQuery%' OR kondisi LIKE '%$searchQuery%'";
        } else {
            $query = "SELECT * FROM ruangan";
        }

        $this->result = mysqli_query($conn, $query);
    }

    public function create($data) {
        $conn = $this->db->getConnection();
        $kode_ruangan = mysqli_real_escape_string($conn, $data['kode_ruangan']);
        $lantai = mysqli_real_escape_string($conn, $data['lantai']);
        $gedung = mysqli_real_escape_string($conn, $data['gedung']);
        $fasilitas = mysqli_real_escape_string($conn, $data['fasilitas']);
        $kondisi = mysqli_real_escape_string($conn, $data['kondisi']);

        $query = "INSERT INTO ruangan (kode_ruangan, lantai, gedung, fasilitas, kondisi) VALUES ('$kode_ruangan', '$lantai', '$gedung', '$fasilitas', '$kondisi')";

        if (mysqli_query($conn, $query)) {
            header("Location: ruanganTambah.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    public function update($id, $data) {
        $conn = $this->db->getConnection();
        $kode_ruangan = mysqli_real_escape_string($conn, $data['kode_ruangan']);
        $lantai = mysqli_real_escape_string($conn, $data['lantai']);
        $gedung = mysqli_real_escape_string($conn, $data['gedung']);
        $fasilitas = mysqli_real_escape_string($conn, $data['fasilitas']);
        $kondisi = mysqli_real_escape_string($conn, $data['kondisi']);

        $query = "UPDATE ruangan SET kode_ruangan='$kode_ruangan', lantai='$lantai', gedung='$gedung', fasilitas='$fasilitas', kondisi='$kondisi' WHERE id_ruangan=$id";

        if (mysqli_query($conn, $query)) {
            header("Location: ruanganEdit.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    public function delete($id) {
        $conn = $this->db->getConnection();
        $query = "DELETE FROM ruangan WHERE id_ruangan=$id";

        if (mysqli_query($conn, $query)) {
            header("Location: ruanganHapus.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ruanganController = new RuanganController();
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'create') {
            $ruanganController->create($_POST);
        } elseif ($action === 'update') {
            $id = $_POST['id'];
            $ruanganController->update($id, $_POST);
        } elseif ($action === 'delete') {
            $id = $_POST['id'];
            $ruanganController->delete($id);
        }
    }
}
?>
