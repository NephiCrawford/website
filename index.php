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
    <title>High Mountain Mechanical - Professional HVAC Services in Olyphant, PA</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="High Mountain Mechanical provides professional HVAC services in Olyphant, PA. Licensed, bonded, and EPA certified technicians offering AC repair, heating services, and maintenance.">
    <meta name="keywords" content="HVAC services, air conditioning repair, heating services, HVAC maintenance, Olyphant PA, EPA certified HVAC, licensed HVAC contractor">
    <meta name="author" content="High Mountain Mechanical">
    
    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="High Mountain Mechanical - Professional HVAC Services">
    <meta property="og:description" content="Professional HVAC services in Olyphant, PA. Licensed, bonded, and EPA certified technicians.">
    <meta property="og:image" content="https://highmountainmechanical.net/images/mountain.jpg">
    <meta property="og:url" content="https://highmountainmechanical.net">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://highmountainmechanical.net">
    
    <link rel="stylesheet" href="css/style.css?v=1.0.6">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "High Mountain Mechanical",
        "image": "https://highmountainmechanical.net/images/mountain.jpg",
        "description": "Professional HVAC services in Olyphant, PA. Licensed, bonded, and EPA certified technicians offering comprehensive heating, cooling, and maintenance services.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "526 Delaware Ave Apt 1",
            "addressLocality": "Olyphant",
            "addressRegion": "PA",
            "postalCode": "18447",
            "addressCountry": "US"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "41.4687",
            "longitude": "-75.6024"
        },
        "url": "https://highmountainmechanical.net",
        "telephone": "+15702660652",
        "email": "info@HighMountainMechanical.net",
        "priceRange": "$$",
        "areaServed": {
            "@type": "City",
            "name": "Olyphant",
            "containedInPlace": {
                "@type": "State",
                "name": "Pennsylvania"
            }
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "08:00",
                "closes": "18:00"
            },
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "09:00",
                "closes": "16:00"
            }
        ],
        "sameAs": [
            "https://www.facebook.com/highmountainmechanical",
            "https://www.instagram.com/highmountainmechanical"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "HVAC Services",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Air Conditioning Services",
                        "description": "Installation, repair, and maintenance of all AC systems"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Heating Services",
                        "description": "Furnace installation and repair services"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Maintenance Services",
                        "description": "Regular maintenance to keep your systems running efficiently"
                    }
                }
            ]
        },
        "foundingDate": "2025-03",
        "numberOfEmployees": "2",
        "knowsAbout": ["HVAC", "Air Conditioning", "Heating", "HVAC Maintenance", "EPA Certification"],
        "certification": ["EPA Certified", "BBB Accredited", "Licensed and Bonded"]
    }
    </script>
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

    <script src="js/main.js?v=1.1.6"></script>
</body>
</html> 