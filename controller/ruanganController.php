<?php
include_once __DIR__ . '/../model/database.php';
include_once __DIR__ . '/../views/admin/ruangan.php';

class RuanganController {
    private $db;
    public $result; // Define a class property to store the result

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

        $this->result = mysqli_query($conn, $query); // Assign to class property
        include_once __DIR__ . '/../../views/admin/ruangan.php';
    }

    public function create($data) {
        $conn = $this->db->getConnection();
        // Assuming $data is an associative array containing the details of the new room
        // Implement your validation and sanitation here
        $kode_ruangan = mysqli_real_escape_string($conn, $data['kode_ruangan']);
        $lantai = mysqli_real_escape_string($conn, $data['lantai']);
        $gedung = mysqli_real_escape_string($conn, $data['gedung']);
        $fasilitas = mysqli_real_escape_string($conn, $data['fasilitas']);
        $kondisi = mysqli_real_escape_string($conn, $data['kondisi']);

        $query = "INSERT INTO ruangan (kode_ruangan, lantai, gedung, fasilitas, kondisi) VALUES ('$kode_ruangan', '$lantai', '$gedung', '$fasilitas', '$kondisi')";

        if (mysqli_query($conn, $query)) {
            // Success, redirect or handle accordingly
            header("Location: ruangan.php");
            exit;
        } else {
            // Error handling
            echo "Error: " . mysqli_error($conn);
        }
    }

    public function update($id, $data) {
        $conn = $this->db->getConnection();
        // Assuming $data is an associative array containing the updated details of the room
        // Implement your validation and sanitation here
        $kode_ruangan = mysqli_real_escape_string($conn, $data['kode_ruangan']);
        $lantai = mysqli_real_escape_string($conn, $data['lantai']);
        $gedung = mysqli_real_escape_string($conn, $data['gedung']);
        $fasilitas = mysqli_real_escape_string($conn, $data['fasilitas']);
        $kondisi = mysqli_real_escape_string($conn, $data['kondisi']);

        $query = "UPDATE ruangan SET kode_ruangan='$kode_ruangan', lantai='$lantai', gedung='$gedung', fasilitas='$fasilitas', kondisi='$kondisi' WHERE id_ruangan=$id";

        if (mysqli_query($conn, $query)) {
            // Success, redirect or handle accordingly
            header("Location: ruangan.php");
            exit;
        } else {
            // Error handling
            echo "Error: " . mysqli_error($conn);
        }
    }

    public function delete($id) {
        $conn = $this->db->getConnection();

        $query = "DELETE FROM ruangan WHERE id_ruangan=$id";

        if (mysqli_query($conn, $query)) {
            // Success, redirect or handle accordingly
            header("Location: ruangan.php");
            exit;
        } else {
            // Error handling
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Create an instance of the controller
$ruanganController = new RuanganController();

// Example usage:
// $ruanganController->create($data);
// $ruanganController->update($id, $data);
// $ruanganController->delete($id);
?>
