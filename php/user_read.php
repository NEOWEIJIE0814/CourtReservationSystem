<?php
session_start();
include 'db_connect.php';

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM user WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}
$conn->close();
?>
