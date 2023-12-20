document.addEventListener("DOMContentLoaded", function () {
    // Get the edit, update, and delete buttons
    const editButton = document.getElementById("edit-button");
    const updateButton = document.getElementById("update-button");
    const deleteButton = document.getElementById("delete-button");

    // Get the input fields
    const inputFields = document.querySelectorAll(".form-group input,.form-group select");

    // Add a click event listener to the Edit button
    editButton.addEventListener("click", function () {
        // Enable input fields for editing
        inputFields.forEach(function (input) {
            input.removeAttribute("readonly");
        });

        // Show the Update button and hide the Edit button
        updateButton.style.display = "inline-block";
        editButton.style.display = "none";
    });

    // Add a click event listener to the Update button
    updateButton.addEventListener("click", function () {
        // Submit the form
        document.querySelector("form").submit();
    });


// Add a click event listener to the Delete button
deleteButton.addEventListener("click", function () {
    // Confirm with the user before proceeding with the deletion
    if (confirm('Are you sure you want to delete this data?')) {
        // Make an AJAX request to delete the data
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'deletedata.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log(xhr.responseText); // Log the response to the console
                if (xhr.status === 200) {
                    // Check the response from the server and handle accordingly
                    if (xhr.responseText.trim() === 'success') {
                        // Data deleted successfully, you can redirect or show a message
                        alert('Data deleted successfully.');
                        resetFormFields(); // Clear input fields
                        window.location.href = 'diplayreg.php'; // Redirect to displayreg.php
                    } else {
                        alert('Failed to delete data. Please try again later.');
                    }
                } else {
                    alert('Error: ' + xhr.status);
                }
            }
        };
        // Send the request
        xhr.send(); // No need to send additional data here
    }
});

// Function to reset/clear form fields
function resetFormFields() {
    // Get the form element
    const form = document.querySelector('form');

    // Reset the form, which clears all input fields
    form.reset();
}
})