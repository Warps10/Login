function toggleRegisterrForm() {
    // Toggle the visibility of the login and register forms
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
}

function toggleLoginnForm() {
    // Toggle the visibility of the login and register forms
   document.getElementById('registerForm').style.display = 'none';

 document.getElementById('loginForm').style.display = 'block';

}

window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var loginError = urlParams.get('login_error');
    if (loginError) {
        alert("Incorrect username or password!");
    }

    var registerError = urlParams.get('register_error');
    if (registerError) {
        alert("Passwords do not match. Please try again.");
        toggleRegisterForm(); // Show the register form
    }

var registerSuccess = urlParams.get('register_success');
    if (registerSuccess) {
        alert("Account created Successfully.");
        toggleLoginForm(); // Show the Login form
    }
};

function toggleRegisterForm() {
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');

    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
}

function toggleLoginForm() {
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');

    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
}