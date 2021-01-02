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
        

$to = "zixuan2001711@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: zixuan2001711@gmail.com";

if(mail($to,$subject,$txt,$headers)){
    echo'sucess';
}else{
    echo'error';
}
?>
    </body>
</html>
