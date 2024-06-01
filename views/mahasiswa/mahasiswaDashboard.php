<?php
include '../middleware.php';
checkAuth();
checkRole('mahasiswa');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Dashboard</title>
</head>
<body>
    <h1>Welcome Mahasiswa, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Logout</a>
    <!-- Mahasiswa-specific content here -->
</body>
</html>
