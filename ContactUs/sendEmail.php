<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
$to = 'zixuan2001711@gmail.com';
$subject = 'Hello from XAMPP!';
$message = "<html><head>
<title>Your email at the time</title>
</head>
<body>
<img src=\"bg-01.jpg\"></body>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}?>
    </body>
</html>