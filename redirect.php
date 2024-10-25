<?php

// Collect the information
$ipAddress = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No referrer';
$requestMethod = $_SERVER['REQUEST_METHOD'];
$queryString = $_SERVER['QUERY_STRING'];
$serverName = $_SERVER['SERVER_NAME'];
$serverSoftware = $_SERVER['SERVER_SOFTWARE'];
$serverProtocol = $_SERVER['SERVER_PROTOCOL'];
$requestUri = $_SERVER['REQUEST_URI'];
$scriptFilename = $_SERVER['SCRIPT_FILENAME'];
$serverPort = $_SERVER['SERVER_PORT'];
$accessTime = date('Y-m-d H:i:s');

// Create the information string
$info = "Access Time: $accessTime\n" .
        "IP Address: $ipAddress\n" .
        "User Agent: $userAgent\n" .
        "Referrer: $referrer\n" .
        "Request Method: $requestMethod\n" .
        "Query String: $queryString\n" .
        "Server Name: $serverName\n" .
        "Server Software: $serverSoftware\n" .
        "Server Protocol: $serverProtocol\n" .
        "Request URI: $requestUri\n" .
        "Script Filename: $scriptFilename\n" .
        "Server Port: $serverPort\n";

// Specify the file to write to
$filename = 'user_info.txt';

// Write the information to the file
file_put_contents($filename, $info, FILE_APPEND | LOCK_EX);

// Display a confirmation message
echo "Information has been recorded.";

?>
