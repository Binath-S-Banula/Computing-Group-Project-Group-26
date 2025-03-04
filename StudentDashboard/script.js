document.addEventListener('DOMContentLoaded', function() {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const navLinks = document.querySelector('.nav-links');

    if (hamburgerMenu) {
        hamburgerMenu.addEventListener('click', function() {
            if (navLinks) {
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            }
        });
    }

    const scheduleBtn = document.querySelector('.schedule-btn');
    if (scheduleBtn) {
        scheduleBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        scheduleBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }

    const courseCards = document.querySelectorAll('.course-card');
    courseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.transition = 'transform 0.3s ease';
            this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
        });
    });

    const seeMoreBtn = document.querySelector('.see-more-btn');
    if (seeMoreBtn) {
        seeMoreBtn.addEventListener('click', function() {
            alert('Loading more courses...');
        });
    }

    const meetLecturerBtn = document.querySelector('.meet-lecturer-btn');
    if (meetLecturerBtn) {
        meetLecturerBtn.addEventListener('click', function() {
            alert('Redirecting to lecturer appointment system...');
        });
    }

    const addNotesBtn = document.querySelector('.add-notes-btn');
    if (addNotesBtn) {
        addNotesBtn.addEventListener('click', function() {
            alert('Opening notes editor...');
        });
    }

    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            const confirmLogout = confirm('Are you sure you want to log out?');
            if (confirmLogout) {
                alert('You have been logged out successfully.');
            }
        });
    }

    const updateDateDisplay = () => {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const dateString = now.toLocaleDateString('en-US', options);
        
        if (!document.querySelector('.date-display')) {
            const dateDisplay = document.createElement('p');
            dateDisplay.classList.add('date-display');
            dateDisplay.style.textAlign = 'center';
            dateDisplay.style.marginTop = '10px';
            dateDisplay.style.fontSize = '1rem';
            dateDisplay.style.color = '#555';
            
            const scheduleContainer = document.querySelector('.schedule-container');
            if (scheduleContainer) {
                scheduleContainer.appendChild(dateDisplay);
            }
        }
        
        const dateDisplay = document.querySelector('.date-display');
        if (dateDisplay) {
            dateDisplay.textContent = dateString;
        }
    };
    
    updateDateDisplay();

    function openNotesModal() {
        new bootstrap.Modal(document.getElementById('notesModal')).show();
    }
    
    function openAppointmentModal() {
        new bootstrap.Modal(document.getElementById('appointmentModal')).show();
    }




});