document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Validate password and confirm password
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmpassword').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match. Please try again.');
        return;
    }

    // Handle form submission logic here
    // ...
});