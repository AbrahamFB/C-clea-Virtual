<?php
// build API request
$APIUrl = 'https://api.email-validator.net/api/verify';
$Params = array('EmailAddress' => 'contacto@abrahamfb.com', 'APIKey' => 'ev-e96f15275a8f9000e2570b494524c0c6');
$Request = http_build_query($Params, '', '&');
$ctxData = array(
    'method' => "POST",
    'header' => "Connection: close\r\n" .
        "Content-Type: application/x-www-form-urlencoded\r\n" .
        "Content-Length: " . strlen($Request) . "\r\n",
    'content' => $Request
);
$ctx = stream_context_create(array('http' => $ctxData));

// send API request
$result = json_decode(file_get_contents($APIUrl, false, $ctx));

// check API result
//print_r($result);
if ($result && $result->{'status'} > 0) {
    switch ($result->{'status'}) {
            // valid addresses have a {200, 207, 215} result code
            // result codes 114 and 118 need a retry
        case 200:
        case 207:
        case 215:
            echo "Address is valid.";
            // 215 - can be retried to update catch-all status
            break;
        case 114:
            // greylisting, wait 5min and retry
            break;
        case 118:
            // api rate limit, wait 5min and retry
            break;
        default:
            echo "Address is invalid.";
            echo $result->{'info'};
            echo $result->{'details'};
            break;
    }
} else {
    echo $result->{'info'};
}
