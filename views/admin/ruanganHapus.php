<?php
include __DIR__ . '/../../model/database.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'];

$query = "DELETE FROM ruangan WHERE id_ruangan = $id";
if (mysqli_query($conn, $query)) {
    header('Location: ruangan.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
