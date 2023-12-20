/*function validateForm() {
    var firstName = document.getElementById("fname").value;
    var lastName = document.getElementById("lname").value;
    var dob = document.getElementById("dob").value;
    var dlNo = document.getElementById("Did").value;
    var address = document.getElementById("address").value;
    var mobile = document.getElementById("mnum").value;
    var email = document.getElementById("mail").value;
    var agree = document.getElementById("checkbox").checked;

    // Required field validation
    if (firstName === "" || lastName === "" || dob === "" || dlNo === "" || address === "" || mobile === "" || email === "") {
        alert("Please fill in all required fields.");
        return false;
    }

    // Email format validation
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Date of Birth validation (must be in the past)
    var currentDate = new Date();
    var dobDate = new Date(dob);
    if (dobDate >= currentDate) {
        alert("Date of Birth must be in the past.");
        return false;
    }

    // Mobile Number validation (must be numeric and have 10 digits)
    var mobilePattern = /^\d{10}$/;
    if (!mobile.match(mobilePattern)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
    }

    // Driving License Number validation (must be alphanumeric)
    var dlNoPattern = /^[a-zA-Z0-9]+$/;
    if (!dlNo.match(dlNoPattern)) {
        alert("Please enter a valid Driving License Number.");
        return false;
    }

    // Check if the user agrees to the policy
    if (!agree) {
        alert("You must agree to the policy.");
        return false;
    }

    return true; // Proceed to the next page if all validations pass
}*/
