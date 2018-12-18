<?php
if(@$_SERVER['PHP_AUTH_USER'] !== "admin" && @$_SERVER['PHP_AUTH_PW'] !=="admin"){
    header("WWW-Authenticate: Basic realm=\"Authorization Required\"");
    header("HTTP\ 1.1 401 Unauthorized");
    echo 'You Are Not Authorize';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>welcome</h1>
</body>
</html>