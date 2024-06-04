<?php
session_start();
include '../auth/config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT uploads.id, uploads.file_name, uploads.upload_date, uploads.verified, user.username, ruangan.kode_ruangan
        FROM uploads 
        JOIN user ON uploads.mahasiswa_id = user.id_user
        JOIN ruangan ON uploads.id_ruangan = ruangan.id_ruangan";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Debugging: Display query error if any
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Peminjaman Ruangan</title>
    <link rel="stylesheet" href="../style/adminverif.css">

</head>
<body>
    <h2>Verifikasi Peminjaman Ruangan</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Surat Peminjaman</th>
            <th>Tanggal Pengajuan</th>
            <th>Ruangan yang ingin dipinjam :</th>
            <th>Status</th>
            <th>Setuju?</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><a href="../uploads/<?php echo htmlspecialchars($row['file_name']); ?>" target="_blank"><?php echo htmlspecialchars($row['file_name']); ?></a></td>
                    <td><?php echo htmlspecialchars($row['upload_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['kode_ruangan']); ?></td>
                    <td><?php echo $row['verified'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <?php if (!$row['verified']): ?>
                            <a href="verifyUpload.php?id=<?php echo $row['id']; ?>">Verify</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">No uploads found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
