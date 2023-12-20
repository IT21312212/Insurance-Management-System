<?php
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
session_start();
if (isset($_SESSION["username"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $username = $_SESSION["username"]; // Get the username from the session
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $DLno = $_POST['DLno'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $insurance = $_POST['insurance'];

        // SQL query to insert data into the database, including the username
        $sql = "INSERT INTO pregistration (username, firstname, lastname, dob, dnumber, address, pnumber, email, instype) 
                VALUES ('$username', '$firstname', '$lastname', '$dob', '$DLno', '$address', '$mobile', '$email', '$insurance')";

        if ($conn->query($sql) === TRUE) {
            // Store the retrieved data in session variables
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["dob"] = $dob;
            $_SESSION["DLno"] = $DLno;
            $_SESSION["address"] = $address;
            $_SESSION["mobile"] = $mobile;
            $_SESSION["email"] = $email;
            $_SESSION["insurance"] = $insurance;

            // Reset the form fields
            echo '<script>';
            echo 'document.getElementById("registrationForm").reset();';
            echo '</script>';

            // Refresh the page
            echo '<script>';
            echo 'window.location.href = "diplayreg.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
