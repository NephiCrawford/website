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