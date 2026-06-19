<?php
if (isset($_POST['SubmitButton1'])) {
    $textMessage = $_POST["userMessage1"];
    $mobileNumber = $_POST["userMobile1"];

    $apiKey = urlencode('YOUR_TEXTLOCAL_API_KEY');

    $numbers = array($mobileNumber);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode($textMessage);
    $numbers = implode(',', $numbers);

    $data = array(
        'apikey' => $apiKey,
        'numbers' => $numbers,
        'sender' => $sender,
        'message' => $message
    );

    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}
?>