<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST{'phone'};
    $subject = $_POST{'subject'};
    $message = $_POST["message"];

    // You can add more validation and sanitation here

    // Send an email (this is just a basic example)
    $to = "khimoli2052@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    mail($to, $subject,$phone, $message, $headers);

    echo "Thank you for contacting us! We will get back to you soon.";
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: contact.html");
    exit();
}

?>

