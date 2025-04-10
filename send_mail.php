<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean and store inputs
    $name = strip_tags(trim($_POST["name"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $query = strip_tags(trim($_POST["query"]));

    // Validate inputs
    if (empty($name) || empty($phone) || empty($query)) {
        echo "<script>alert('Please fill in all the fields.'); history.back();</script>";
        exit;
    }

    // Email settings
    $to = "sharmar981099@gmail.com"; // <-- Change this to your real email
    $subject = "New Query from Comopower Website";
    $message = "You have received a new query from the website:\n\n";
    $message .= "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Query:\n$query\n";

    $headers = "From: Comopower Website <no-reply@yourdomain.com>\r\n";
    $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was a problem sending your message.'); history.back();</script>";
    }
} else {
    // If accessed without POST
    echo "<script>alert('Invalid request method.'); window.location.href='index.html';</script>";
}
?>
