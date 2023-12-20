<!DOCTYPE html>
<html>
<head>
    <title>INSURANCE Page</title>
    <link rel="stylesheet" href="registration1.css">
    <script src="personalReg.js"></script>
</head>
<body>
   
    <h1>INSURANCE PAGE</h1>
    <?php
    session_start();
     if (isset($_SESSION["username"])) { ?>
    <div class="registration-container">
        <div class="form-container personal-details">
            <h3><u>INSURANCE INFORMATION</u></h3>
            <form id="registrationForm" action="action_page.php" method="post" onsubmit="return validateForm()">
                <label for="firstname">Applicant's First Name</label>
                <input type="text" name="firstname" id="fname" required>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lname" required><br>
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required><br>
                <label for="DLno">Driving License Number</label>
                <input type="text" name="DLno" id="Did" required pattern=".{1,8}" title="License number must be 1 to 8 characters">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required><br>
                <label for="mobile">Mobile Number</label>
                <input type="text" name="mobile" id="mnum" required pattern="[0-9]{1,10}" title="Mobile number must be 1 to 10 digits"><br>
                <label for="email">Email Address</label>
                <input type="text" name="email" id="mail" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"><br><br>
                <label for="insurance">Insurance Type</label>
                <select name="insurance" id="insurance" required>
                    <option value="" disabled selected>Select an insurance type</option>
                    <option value="Liability Insurance">Liability Insurance</option>
                    <option value="Comprehensive Cover">Comprehensive Cover</option>
                    <option value="Accident">Accident</option>
                    <option value="Comprehensive Coverage">Comprehensive Coverage</option>
                    </select><br><br>
                <h5>WARRANTY</h5>
                <p>I/We understand and agree that any misstatement of warranty of fact on this application shall be considered a violation of coverage afforded under any policy issued on the basis of this application. I/We understand and agree that this application shall form part of any policy issued.</p><br>
                <label>Agree to the Policy</label>
                <input type="checkbox" name="agree" value="agree" id="checkbox" required><br>
                <button type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
    <?php } else {
        echo "Please login first.";
    } ?>

</body>
</html>
