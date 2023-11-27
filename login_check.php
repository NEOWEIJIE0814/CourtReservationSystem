<?php
session_start(); // Start a PHP session for user authentication

include 'db_connect.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];

    // Perform SQL query to check if the user ID and password match
    $sql = "SELECT * FROM user WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Use password_verify to check the entered password against the stored hashed password
        if (password_verify($password, $row["user_password"])) {
            // Authentication successful, set session variables
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_name"] = $row["user_name"]; // Set other user-related session variables
            // Debugging: Echo session variables
            echo "User ID: " . $_SESSION["user_id"] . "<br>";
            echo "User Name: " . $_SESSION["user_name"] . "<br>";
            session_write_close(); // Write session data and close the session

            header("Location: profile.html"); // Redirect to the user profile page
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User ID not found
        echo "User ID not found. Please check your credentials.";
    }
}

$conn->close();
?>
