<?php
include 'db_connect.php';

session_start();

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode($user);
    } else {
        echo json_encode(["error" => "User not found"]);
    }
} else {
    echo json_encode(["error" => "User not authenticated"]);
}

$conn->close();
?>
