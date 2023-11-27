<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["user_password"])) {
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_name"] = $row["user_name"];
            header("Location: profile.html");
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User ID not found. Please check your credentials.";
    }
}

$conn->close();
?>
