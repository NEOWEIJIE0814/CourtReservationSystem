<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = password_hash($_POST["user_password"], PASSWORD_DEFAULT); // Hash the password for security

    $sql = "INSERT INTO user (user_id, user_name, user_email, user_password) VALUES ('$user_id', '$user_name', '$user_email', '$user_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href = 'login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
