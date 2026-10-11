<?php
require_once __DIR__ . '/../includes/lang.php';

function redirectToContact(string $status): void
{
    $_SESSION['contact_status'] = $status;
    header('Location: ../contact.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectToContact('invalid');
}

$sports = [
    'Rugby', 'Soccer', 'Netball', 'Hockey', 'Cricket',
    'Basketball', 'Volleyball', 'Softball', 'Athletics',
    'Track and Field', 'Tennis', 'Table Tennis', 'Karate',
    'Body Building', 'Chess', 'Dance', 'Aerobics', 'Bursary Enquiry'
];

$name = is_string($_POST['name'] ?? null) ? trim($_POST['name']) : '';
$email = is_string($_POST['email'] ?? null) ? trim($_POST['email']) : '';
$sport = is_string($_POST['sport'] ?? null) ? trim($_POST['sport']) : '';
$message = is_string($_POST['message'] ?? null) ? trim($_POST['message']) : '';
$csrfToken = is_string($_POST['csrf_token'] ?? null) ? $_POST['csrf_token'] : '';

if (
    !is_string($_SESSION['contact_csrf'] ?? null)
    || $csrfToken === ''
    || !hash_equals($_SESSION['contact_csrf'], $csrfToken)
) {
    redirectToContact('csrf');
}

$_SESSION['contact_form_data'] = [
    'name' => $name,
    'email' => $email,
    'sport' => $sport,
    'message' => $message,
];

if (
    strlen($name) < 2
    || strlen($name) > 200
    || strlen($email) > 254
    || filter_var($email, FILTER_VALIDATE_EMAIL) === false
    || !in_array($sport, $sports, true)
    || strlen($message) < 10
    || strlen($message) > 10000
) {
    redirectToContact('invalid');
}

$recipient = 'hello@campusplay.co.za';
$subject = 'CampusPlay enquiry: ' . $sport;
$body = implode("\n", [
    'Name: ' . $name,
    'Email: ' . $email,
    'Sport: ' . $sport,
    '',
    'Message:',
    str_replace(["\r\n", "\r"], "\n", $message),
]);
$headers = implode("\r\n", [
    'From: CampusPlay <hello@campusplay.co.za>',
    'Reply-To: ' . $email,
    'Content-Type: text/plain; charset=UTF-8',
]);

if (!mail($recipient, $subject, $body, $headers)) {
    error_log('CampusPlay contact email could not be sent.');
    redirectToContact('failed');
}

unset($_SESSION['contact_form_data']);
$_SESSION['contact_csrf'] = bin2hex(random_bytes(32));
redirectToContact('sent');