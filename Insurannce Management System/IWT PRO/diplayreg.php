<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link rel="stylesheet" type="text/css" href="display.css">
    <script src="displayReg.js"></script>

</head>
<body>
    <?php
    // Start the session
    session_start();
    
    // Check if session variables are set and not empty
    if (isset($_SESSION["firstname"]) && !empty($_SESSION["firstname"]) &&
        isset($_SESSION["lastname"]) && !empty($_SESSION["lastname"]) &&
        isset($_SESSION["dob"]) && !empty($_SESSION["dob"]) &&
        isset($_SESSION["DLno"]) && !empty($_SESSION["DLno"]) &&
        isset($_SESSION["address"]) && !empty($_SESSION["address"]) &&
        isset($_SESSION["mobile"]) && !empty($_SESSION["mobile"]) &&
        isset($_SESSION["email"]) && !empty($_SESSION["email"]) &&
        isset($_SESSION["insurance"]) && !empty($_SESSION["insurance"])) {
        echo "<h1>Check your Information Details</h1>";
        echo "<div class='f1'>";
        echo "<h1>Insurance Information</h1>";
        echo "<form method='POST'id='updateForm' action='updatedata.php'>";
        echo "<div class='form-group'>";
        echo "<label for='firstname'>First Name:</label>";
        echo "<input type='text' id='firstname' name='firstname' value='" . $_SESSION["firstname"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='lastname'>Last Name:</label>";
        echo "<input type='text' id='lastname' name='lastname' value='" . $_SESSION["lastname"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='dob'>Date of Birth:</label>";
        echo "<input type='date' id='dob' name='dob' value='" . $_SESSION["dob"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='DLno'>Driving License Number:</label>";
        echo "<input type='text' id='DLno' name='DLno' value='" . $_SESSION["DLno"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='address'>Address:</label>";
        echo "<input type='text' id='address' name='address' value='" . $_SESSION["address"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='mobile'>Mobile Number:</label>";
        echo "<input type='text' id='mobile' name='mobile' value='" . $_SESSION["mobile"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='text' id='email' name='email' value='" . $_SESSION["email"] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='insurance'>Insurance Type:</label>";
        echo "<input type='text' id='insurance' name='insurance'value='" . $_SESSION["insurance"] . "' readonly>";
        echo "</div>";
        // Edit, Update, and Delete buttons
        echo "<div class='button-group'>";
        echo "<button type='button' id='edit-button'>Edit</button>";
        echo "<button type='submit' id='update-button' style='display: none;'>Update</button>";
        echo "<button type='button' id='delete-button'onclick='deleteData()'>Delete</button>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Session data is incomplete or missing.";
        echo "<script>";
        echo "window.location.href = 'diplayreg.php';"; // Redirect to the same page to refresh
        echo "</script>";
    }

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

    // Query to retrieve past details
    $sql = "SELECT * FROM pregistration WHERE username = '" . $_SESSION["username"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='f2'>";
        echo "<h1>Past Insurance Details</h1>";
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Driving License Number</th><th>Address</th><th>Mobile Number</th><th>Email</th><th>Insurance Type</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["dnumber"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["pnumber"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["instype"] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        echo "</div>";
    } else {
        echo '<script>';
        echo 'alert("No past insurance details found.");';
        echo '</script>';
    }

    $conn->close();
    ?>
</body>
</html>
