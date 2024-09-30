<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Process the form data, e.g., send an email or store in a database
    $to = "krutarthghuge@gmail.com";
    $subject = "New Message from Github Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // Redirect to a thank you page
        header("Location: sent.html");
        exit;
    } else {
        echo "Failed to send message.";
    }
}
?>
