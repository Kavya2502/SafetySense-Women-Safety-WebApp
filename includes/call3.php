<?php

if(isset($_POST['SubmitButton3']))
{
    $textMessage = $_POST["userMessage3"];
    $mobileNumber = $_POST["userMobile3"];
    $apiKey = urlencode('YOUR_TEXTLOCAL_API_KEY');

    // Message details
    $numbers = array($mobileNumber);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode($textMessage);
    $numbers = implode(',', $numbers);

    // Prepare data for POST request
    $data = array(
        'apikey' => $apiKey,
        'numbers' => $numbers,
        'sender' => $sender,
        'message' => $message
    );

    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Process response
    echo $response;
}

?>