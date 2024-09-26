<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate that all fields are filled out
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Prepare email to be sent
    $to = "krutarthghuge@gmail.com";
    $subject = "New Message from GitHub Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Try to send the email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: sent.html");
        exit;
    } else {
        echo "Failed to send the message. Please try again later.";
    }
}
?>
