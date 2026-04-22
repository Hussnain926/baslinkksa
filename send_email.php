<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $project = trim($_POST["project"]);

    // Set the recipient email address.
    $to = "Sales@baselineksa.com";

    // Set the email subject.
    $subject = "Form Submission";

    // Build the email content.
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Project Description:\n$project\n";

    // Set the email headers.
    $headers = "From: $name <$email>";

    // Send the email.
    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Your message has been sent. Thank you!</p>";

        // Redirect after 2 seconds
        header("Refresh:2; url=https://bmtpakistan.com/bcc/index.html"); // Redirect after 2 seconds
        exit(); // Make sure to stop further execution
    } else {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
}
?>