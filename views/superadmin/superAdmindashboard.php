<?php
include '../auth/middleware.php';
checkAuth();
checkRole('superadmin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <a href="../logout.php">Logout</a>
    <!-- Mahasiswa-specific content here -->
</body>
</html>
