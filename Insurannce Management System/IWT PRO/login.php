<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to your login database (Replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "insurence");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database to check if the user exists
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Valid user, set session and redirect
        $_SESSION["username"] = $username;
        $successMessage = "Login successful! Redirecting to registration page...";
        header("Refresh: 1; URL=registration.php"); // Redirect after 1 seconds
    } else {
        $errorMessage = "Invalid username or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (isset($successMessage)) { ?>
        <p><?php echo $successMessage; ?></p>
    <?php } ?>
    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
