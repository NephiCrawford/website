<?php
    $view = isset($_GET['view']) ? $_GET['view'] : 'home';
    $valid_views = ['home', 'services', 'about', 'contact'];
    if (!in_array($view, $valid_views)) {
        $view = 'home';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Mountain Mechanical - HVAC Services</title>
    <link rel="stylesheet" href="css/style.css?v=1.1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="images/mountain.jpg" alt="High Mountain Mechanical Logo" class="logo-image">
                <h1>High Mountain Mechanical</h1>
            </div>
            <div class="nav-links">
                <a href="?view=home" class="<?php echo $view === 'home' ? 'active' : ''; ?>">Home</a>
                <a href="?view=services" class="<?php echo $view === 'services' ? 'active' : ''; ?>">Services</a>
                <a href="?view=about" class="<?php echo $view === 'about' ? 'active' : ''; ?>">About</a>
                <a href="?view=contact" class="<?php echo $view === 'contact' ? 'active' : ''; ?>">Contact</a>
            </div>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <main id="main-content">
        <?php include "views/{$view}.php"; ?>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><i class="fas fa-phone"></i> (570) 266-0652</p>
                <p><i class="fas fa-envelope"></i> info@HighMountainMechanical.net</p>
                <p><i class="fas fa-location-dot"></i> 526 Delaware Ave Apt 1</p>
                <p>Olyphant, PA 18447</p>
            </div>
            <div class="footer-section">
                <h3>Business Hours</h3>
                <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                <p>Saturday: 9:00 AM - 4:00 PM</p>
                <p>Sunday: Closed</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> High Mountain Mechanical. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/main.js?v=1.1.2"></script>
</body>
</html> 