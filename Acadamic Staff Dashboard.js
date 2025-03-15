const signupBtn = document.querySelector('.btn-lg');
if (signupBtn) {
    signupBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to log out?')) {
            alert('You have been logged out successfully!');
        }
    });
}
/*
const loginBtn = document.querySelector('.as-login-btn');
if (loginBtn) {
    loginBtn.addEventListener('click', function() {
        alert('Welcome to your profile');
    });
}*/

function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString();
    const dateString = now.toLocaleDateString();
    document.getElementById('digitalClock').textContent = timeString;
    document.getElementById('currentTime').textContent = dateString;
}

setInterval(updateTime, 1000);
updateTime();

function openNotesModal() {
    new bootstrap.Modal(document.getElementById('notesModal')).show();
}

function openAppointmentModal() {
    new bootstrap.Modal(document.getElementById('appointmentModal')).show();
}