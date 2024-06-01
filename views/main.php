<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard dengan Sidebar</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
    <div class="glass-rectangle">
        <div class="glass-rectangle-content">
            <div class="p-3 background: rgba(255, 255, 255, 0.2); rounded">
                <div class="d-flex justify-content-between mb-3">
                    <h2>Selamat datang di web kami, mari baca ini terlebih dahulu</h2>
                    <br>
                    <p>Admin bisa membuat akun mahasiswa, yang mana nanti mahasiswa akan bisa login menggunakan akun tersebut.</p>
                    <br>
                    <p>Mahasiswa bisa meminjam ruangan kepada ADMIN TU setelah login menggunakan sidebar di kiri.</p>
                </div>
                <br>
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
