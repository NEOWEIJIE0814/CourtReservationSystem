<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $new_name = $_POST["new_name"];
    $new_email = $_POST["new_email"];
    $new_password = $_POST["new_password"];

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Perform SQL query to update user profile
    $sql = "UPDATE user SET user_name='$new_name', user_email='$new_email', user_password='$hashed_password' WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Error updating profile: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();
?>
