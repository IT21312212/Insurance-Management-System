<?php
// Start the session
session_start();

// Check if the session is active and user is logged in
if (isset($_SESSION["username"])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insurence";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the user's username from the session
    $username = $_SESSION['username'];

    // Modify the SQL query to delete the most recent record based on the username
    $sql = "DELETE FROM pregistration WHERE username = '$username' ORDER BY id DESC LIMIT 1";

    if ($conn->query($sql) === TRUE) {
        // Data deleted successfully
        echo "success";
    } else {
        // Failed to delete data
        echo "error";
    }

    $conn->close();
} else {
    // Session not active or user not logged in
    echo "error";
}
?>
