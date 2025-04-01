document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu functionality
    const mobileMenuBtn = document.querySelector('.mobile-menu');
    const navLinks = document.querySelector('.nav-links');
    const body = document.body;

    // Create overlay element
    const overlay = document.createElement('div');
    overlay.className = 'mobile-menu-overlay';
    body.appendChild(overlay);

    // Toggle mobile menu
    mobileMenuBtn.addEventListener('click', function() {
        navLinks.classList.toggle('active');
        overlay.classList.toggle('active');
        body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    });

    // Close menu when clicking overlay
    overlay.addEventListener('click', function() {
        navLinks.classList.remove('active');
        overlay.classList.remove('active');
        body.style.overflow = '';
    });

    // Close menu when clicking a link
    const menuLinks = document.querySelectorAll('.nav-links a');
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.classList.remove('active');
            overlay.classList.remove('active');
            body.style.overflow = '';
        });
    });

    // Handle view switching
    const mainContent = document.getElementById('main-content');
    const links = document.querySelectorAll('a[href^="?view="]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            const view = href.split('=')[1];
            
            // Update active state
            menuLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            // Update URL without page reload
            window.history.pushState({}, '', href);
            
            // Load new view content
            fetch(`views/${view}.php`)
                .then(response => response.text())
                .then(html => {
                    mainContent.innerHTML = html;
                    // Scroll to top of content
                    mainContent.scrollIntoView({ behavior: 'smooth' });
                })
                .catch(error => console.error('Error loading view:', error));
        });
    });

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const view = urlParams.get('view') || 'home';
        
        // Update active state
        menuLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `?view=${view}`) {
                link.classList.add('active');
            }
        });
        
        // Load view content
        fetch(`views/${view}.php`)
            .then(response => response.text())
            .then(html => {
                mainContent.innerHTML = html;
                mainContent.scrollIntoView({ behavior: 'smooth' });
            })
            .catch(error => console.error('Error loading view:', error));
    });

    // Smooth scroll for anchor links within the current view
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Navbar scroll effect
    let lastScroll = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll <= 0) {
            navbar.classList.remove('scroll-up');
            return;
        }

        if (currentScroll > lastScroll && !navbar.classList.contains('scroll-down')) {
            // Scroll Down
            navbar.classList.remove('scroll-up');
            navbar.classList.add('scroll-down');
        } else if (currentScroll < lastScroll && navbar.classList.contains('scroll-down')) {
            // Scroll Up
            navbar.classList.remove('scroll-down');
            navbar.classList.add('scroll-up');
        }
        lastScroll = currentScroll;
    });
}); 