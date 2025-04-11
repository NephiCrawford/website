<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    // Email recipient
    $to = "MeeksFamily06@Outlook.com";

    // Email subject
    $subject = "New Contact Form Submission - " . $service;

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Service: $service\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect back to contact page with success message
        header("Location: contact.php?status=success&message=Thank you for your message. We will get back to you soon!");
    } else {
        // Redirect back to contact page with error message
        header("Location: contact.php?status=error&message=Sorry, there was an error sending your message. Please try again.");
    }
} else {
    // If someone tries to access this file directly
    header("Location: contact.php");
}
exit(); 