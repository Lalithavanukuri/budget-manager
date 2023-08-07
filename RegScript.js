// Function to validate the registration form
function Validate() {
    // Get form elements
    var name = document.forms["RegistrationForm"]["name"].value;
    var mobile = document.forms["RegistrationForm"]["mobile"].value;
    var gender = document.forms["RegistrationForm"]["gender"].value;
    var age = document.forms["RegistrationForm"]["age"].value;
    var username = document.forms["RegistrationForm"]["username"].value;
    var email = document.forms["RegistrationForm"]["email"].value;
    var password = document.forms["RegistrationForm"]["password"].value;

    // Basic form validation
    if (name === "") {
        alert("Name field must be filled out");
        return false;
    }

    if (mobile === "" || isNaN(mobile) || mobile.length !== 10) {
        alert("Please enter a valid 10-digit mobile number");
        return false;
    }

    if (gender === "") {
        alert("Gender field must be filled out");
        return false;
    }

    if (age === "" || isNaN(age) || age < 18) {
        alert("Please enter a valid age (must be at least 18 years old)");
        return false;
    }

    if (username === "") {
        alert("Username field must be filled out");
        return false;
    }

    if (email === "" || !email.includes("@")) {
        alert("Please enter a valid email address");
        return false;
    }

    if (password === "") {
        alert("Password field must be filled out");
        return false;
    }

    // Additional validation or submission code can be added here as needed

    return true; // If all validation passes, form will be submitted
}
