<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Retrieve the updated values from the form
    $newFirstName = $_POST["firstname"];
    $newLastName = $_POST["lastname"];
    $newDOB = $_POST["dob"];
    $newDLno = $_POST["DLno"];
    $newAddress = $_POST["address"];
    $newMobile = $_POST["mobile"];
    $newEmail = $_POST["email"];
    $newInsurance = $_POST["insurance"];

    // Get the session username
    $username = $_SESSION["username"];

    // Identify the most recently inserted record by the user
    $sql = "SELECT MAX(id) AS max_id FROM pregistration WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maxId = $row["max_id"];

        // Update the most recently inserted record
        $updateSql = "UPDATE pregistration SET
            firstname = '$newFirstName',
            lastname = '$newLastName',
            dob = '$newDOB',
            dnumber = '$newDLno',
            address = '$newAddress',
            pnumber = '$newMobile',
            email = '$newEmail',
            instype = '$newInsurance'
            WHERE id = '$maxId'";

        if ($conn->query($updateSql) === TRUE) {
            // Fetch the updated data from the database
            $fetchSql = "SELECT * FROM pregistration WHERE id = '$maxId'";
            $fetchResult = $conn->query($fetchSql);

            if ($fetchResult->num_rows > 0) {
                $row = $fetchResult->fetch_assoc();
                // Update the session variables with the updated data
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["dob"] = $row["dob"];
                $_SESSION["DLno"] = $row["dnumber"];
                $_SESSION["address"] = $row["address"];
                $_SESSION["mobile"] = $row["pnumber"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["insurance"] = $row["instype"];
            }

            echo '<script>';
            echo 'alert("Data updated successfully");';
            echo "window.location.href = 'diplayreg.php';"; // Redirect to the same page to refresh
            echo '</script>';
            
        } else {
            echo "Error updating data: " . $conn->error;
        }
    } else {
        // No records found for the user
        echo 'error: No records found for this user.';
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
