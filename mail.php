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

    // Send form data to the webhook URL
    $webhook_url = "https://hook.us1.make.com/6904efmkh4k6dipg2lcgtx8cf5ihxnwq";
    $webhook_data = array(
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'purpose' => $purpose
    );

    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($webhook_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $webhook_response = curl_exec($ch);
    curl_close($ch);

    if (mail($to, $subject, $body, $headers)) {
        header("Location: thankyou.html");
    } else {
        echo "<p>Sorry, there was an error sending your message.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}

?>