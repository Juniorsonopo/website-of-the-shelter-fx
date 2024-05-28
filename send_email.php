<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $name = htmlspecialchars($input['name']);
    $email = htmlspecialchars($input['email']);
    $phone = htmlspecialchars($input['phone']);
    $package = htmlspecialchars($input['package']);

    $to = 'theshelterfx@gmail.com';
    $subject = 'New Package Purchase';
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nPackage: $package";
    $headers = 'From: noreply@theshelterfx.com' . "\r\n" .
               'Reply-To: noreply@theshelterfx.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    http_response_code(405);
}
?>
