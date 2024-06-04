<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $subject = htmlspecialchars($_POST['subject']);
    $message_content = htmlspecialchars($_POST['message']);
    
    $message = "
    <html>
    <head>
    <title>$subject</title>
    </head>
    <body>
    <div style='background-color: #4287f5; padding: 20px; border-radius: 8px;'>
        <p style='font-weight: bold;'>Username: $username</p>
        <p style='font-weight: bold;'>Password: $password</p>
        <p style='margin-top: 20px;'>$message_content</p>
    </div>
    </body>
    </html>
    ";
    

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";

    if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>
