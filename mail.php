<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $purpose = $_POST['purpose'];
    $headers = "From: noreply@axrealtors.com\r\n";

    $to = "info@axrealtors.com"; // Change this to your email address
    $subject = "Message from $name";
    $body = "From: $name\nPhone: $phone\nEmai: $email\nPurpose:\n$purpose";
    
    if (mail($to, $subject, $body, $headers)) {
        header("Location: thankyou.html");
    } else {
        echo "<p>Sorry, there was an error sending your message.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>