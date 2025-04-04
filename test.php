<?php 

function valid_password($password) {
    $uppercase = preg_match('/[A-Z]/', $password);
    $lowercase = preg_match('/[a-z]/', $password);
    $number    = preg_match('/[0-9]/', $password);
    $length    = strlen($password) >= 8;

    switch ($password) {
        case !$uppercase:
            return "Password must contain at least one uppercase letter";
        case !$lowercase:
            return "Password must contain at least one lowercase letter";
        case !$number:
            return "Password must contain at least one number";
        case !$length:
            return "Password must be at least 8 characters long";
        default:
            return "Password is valid";
    }
}

echo valid_password('e%r');