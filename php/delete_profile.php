<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];

    // Perform SQL query to delete user profile
    $sql = "DELETE FROM user WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        session_unset();  // Unset all session variables
        session_destroy(); // Destroy the session
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Error deleting profile: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();
?>
