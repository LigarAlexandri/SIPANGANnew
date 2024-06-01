<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Glassmorphism Rectangle</title>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(to right, #2196F3, #00BCD4); /* Background gradient */
    }

    .glass-rectangle {
        width: 300px;
        height: 150px;
        background: rgba(255, 255, 255, 0.15); /* Transparent white background */
        backdrop-filter: blur(10px); /* Apply blur effect */
        border-radius: 20px; /* Soften the edges */
        border: 1px solid rgba(255, 255, 255, 0.2); /* Border for contrast */
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37); /* Soft shadow */
        backdrop-filter: blur(8px); /* Soften the background */
        overflow: hidden; /* Hide content overflow */
    }

    .glass-rectangle-content {
        padding: 20px; /* Add padding for content */
        color: white; /* Text color */
    }
</style>
</head>
<body>

<div class="glass-rectangle">
    <div class="glass-rectangle-content">
        <h2>Glassmorphism Rectangle</h2>
        <p>This is a rectangle with soft sides and a glassmorphism aesthetic.</p>
    </div>
</div>

</body>
</html>
