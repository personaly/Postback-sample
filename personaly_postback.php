<?php 

$secret_key = 'Your secret key';

// Persona.ly server IP addresses
$allowed_ips = array(
    '162.243.242.7',
    '162.243.34.227',
);

// Proceess only requests from Persona.ly IP addresses
// This is optional validation
if (!in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) {
    echo 0;
    die();
}
    
// Get params
$user_id = $_REQUEST['user_id'];
$amount = $_REQUEST['amount'];
$offer_id = $_REQUEST['offer_id'];
$app_id = $_REQUEST['app_id'];
$signature = $_REQUEST['signature'];
$offer_name = $_REQUEST['offer_name'];
// Create validation signature
$validation_signature = md5($user_id . ':' . $app_hash . ':' . $secret_key); // the app_hash can be found in your app settings

if ($signature != $validation_signature) {
    // Signatures not equal - send error code
    echo 0;
    die();
}

// Validation was successful. Credit user process.
echo 1;
die();

?>
