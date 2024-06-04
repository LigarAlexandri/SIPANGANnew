<?php
session_start();
include '../auth/config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Update the verified status of the upload
    $sql = "UPDATE uploads SET verified = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Get the id_ruangan from the uploads table
    $sql = "SELECT id_ruangan FROM uploads WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned any results
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_ruangan = $row['id_ruangan'];

        // Update the kondisi of the ruangan to 'TERISI'
        $sql = "UPDATE ruangan SET kondisi = 'TERISI' WHERE id_ruangan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_ruangan);
        $stmt->execute();

        // Send email to the mahasiswa
        $sql = "SELECT user.email, ruangan.kode_ruangan FROM user 
                JOIN uploads ON user.id_user = uploads.mahasiswa_id 
                JOIN ruangan ON uploads.id_ruangan = ruangan.id_ruangan 
                WHERE uploads.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $to = $row['email'];
            $subject = "Peminjaman Ruangan Diterima";
            $message = "Pengajuan ruangan anda diterima. Ruangan yang anda pinjam adalah: " . htmlspecialchars($row['kode_ruangan']);
            $headers = "From: no-reply@yourdomain.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Email berhasil terkirim";
            } else {
                echo "Gagal mengirim email";
            }
        } else {
            echo "Email mahasiswa tidak ditemukan.";
        }

        // Redirect back to the uploads view page
        header("Location: adminVerif.php");
    } else {
        echo "Data upload tidak ditemukan.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
