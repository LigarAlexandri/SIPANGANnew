<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPANGAN LOGIN</title>
    <link rel="stylesheet" href="style/login-style.css">
</head>
<body>
<div class="container">
    <div class="glass-rectangle">
        <div class="glass-rectangle-content">
            <h2>SISTEM PEMINJAMAN RUANGAN</h2>
            <h2>Login</h2>

            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
