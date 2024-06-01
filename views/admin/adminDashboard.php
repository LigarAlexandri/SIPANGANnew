<?php
include '../middleware.php';
checkAuth();
checkRole('admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome Admin, <?php echo $_SESSION['username']; ?></h1>
    <a href="../logout.php">Logout</a>
    <!-- Admin-specific content here -->
</body>
</html>
