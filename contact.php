<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - High Mountain Mechanical</title>
    <link rel="stylesheet" href="css/style.css?v=1.0.3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>High Mountain Mechanical</h1>
            </div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
                <a href="about.php">About</a>
                <a href="contact.php" class="active">Contact</a>
            </div>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <main>
        <section class="page-header">
            <h1>Contact Us</h1>
            <p>Get in touch with our team of HVAC experts</p>
        </section>

        <section class="contact-content">
            <div class="contact-info">
                <div class="info-card">
                    <i class="fas fa-phone"></i>
                    <h3>Phone</h3>
                    <p>(570) 266-0652</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Email</h3>
                    <p>info@HighMountainMechanical.net</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-location-dot"></i>
                    <h3>Address</h3>
                    <p>526 Delaware Ave Apt 1</p>
                    <p>Olyphant, PA 18447</p>
                </div>
            </div>

            <div class="contact-form">
                <h2>Send us a Message</h2>
                <?php
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    $message = isset($_GET['message']) ? $_GET['message'] : '';
                    $class = $status === 'success' ? 'alert-success' : 'alert-error';
                    echo "<div class='alert {$class}'>{$message}</div>";
                }
                ?>
                <form action="process_contact.php" method="POST" class="contact-form-container">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required placeholder="Your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="your@email.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" required placeholder="(555) 555-5555">
                    </div>
                    <div class="form-group">
                        <label for="service">Service Needed</label>
                        <select id="service" name="service" required>
                            <option value="">Select a Service</option>
                            <option value="air-conditioning">Air Conditioning</option>
                            <option value="heating">Heating</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Tell us about your HVAC needs..."></textarea>
                    </div>
                    <button type="submit" class="cta-button">Send Message</button>
                </form>
            </div>
        </section>

        <section class="business-hours">
            <h2>Business Hours</h2>
            <div class="hours-grid">
                <div class="hours-card">
                    <h3>Monday - Friday</h3>
                    <p>8:00 AM - 6:00 PM</p>
                </div>
                <div class="hours-card">
                    <h3>Saturday</h3>
                    <p>9:00 AM - 4:00 PM</p>
                </div>
                <div class="hours-card">
                    <h3>Sunday</h3>
                    <p>Closed</p>
                </div>
            </div>
        </section>
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

    <script src="js/main.js?v=1.0.3"></script>
</body>
</html> 