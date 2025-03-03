const signupBtn = document.querySelector('.signup-btn');
if (signupBtn) {
    signupBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to log out?')) {
            alert('You have been logged out successfully!');
        }
    });
}

const loginBtn = document.querySelector('.login-btn');
if (loginBtn) {
    loginBtn.addEventListener('click', function() {
        alert('Welcome to your profile');
    });
}
