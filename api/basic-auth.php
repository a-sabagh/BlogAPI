<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("WWW-Authenticate: Basic realm=\"Authorization Required\"");

if (@$_SERVER['PHP_AUTH_USER'] !== "admin" || @$_SERVER['PHP_AUTH_PW'] !== "admin") {
    header("HTTP\ 1.1 401 Unauthorized");
    echo json_encode(
        [
            'message' => 'Not Authorize',
            'username' => $_SERVER['PHP_AUTH_PW'],
            'password' => $_SERVER['PHP_AUTH_PW'],
        ]
    );
} else {
    echo json_encode(
        [
            'message' => 'Authorize',
            'username' => $_SERVER['PHP_AUTH_PW'],
            'password' => $_SERVER['PHP_AUTH_PW'],
        ]
    );
}
