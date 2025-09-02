<?php
// Sanitize inputs
function sanitize($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Generate OTP
function generateOTP($length = 6)
{
    return rand(pow(10, $length - 1), pow(10, $length) - 1);
}

// Send email (placeholder)
function sendEmail($to, $subject, $message)
{
    // Use PHPMailer or mail() function here
    return mail($to, $subject, $message);
}
