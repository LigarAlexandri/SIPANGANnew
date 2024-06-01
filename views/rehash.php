<?php
include 'config.php';

$sql = "SELECT id_user, username, password FROM user";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $id = $row['id_user'];
    $plain_password = $row['password'];
    
    // Only hash if the password is not already hashed
    if (password_needs_rehash($plain_password, PASSWORD_DEFAULT)) {
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

        $update_sql = "UPDATE user SET password = ? WHERE id_user = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $hashed_password, $id);
        $update_stmt->execute();
        $update_stmt->close();
    }
}

$conn->close();
echo "All passwords have been hashed.";
?>
