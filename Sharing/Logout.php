<?php  session_start();?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
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
        <style>
           table{    
                margin-right: auto;
                margin-left: auto;
            }
            table a{
                 text-decoration: none;
                 color: blue;
                 font-size: 1em;
            }
            #success{
              margin-top:25px;
              padding:15px;
              border:2px solid black;
              border-radius: 5px;
              width:65%;
              height:250px;
              color:green;
              text-align: center;   
              background-color: white;
          }
          .error2{
              margin-top:25px;
              padding:15px;
              border:2px solid black;
              border-radius: 5px;
              width:65%;
              height:250px;
              color:red;
              text-align: center;   
              background-color: white;
              margin-left: 260px;
              font-style:normal;
          }
        </style>
        
        <?php
     
       if(!isset($_SESSION['name'])){
               echo"<table class='error2'><tr><td><img src='../Sharing/image/alert.png'/>";
                echo "<h1>You haven't sign in</h1>";
                 echo"<a href='../Sharing/Login.php' style='font-size:17px;'> Go back to login form</a>";
                 echo"</td></tr></table>";
                 exit();
            }
            else{
                 $_SESSION=array();
                 session_destroy();
                
                  echo"<table id='success'><tr><td><img src='../Sharing/image/tick.png'/>";
				echo '<h1>Logout</h1>
				<p style="font-size:19px;">You have logouted successfully.<br></p>';
                                echo"<a href='../Home/Home.php' style='font-size:17px;'> Go back to Home</a>";
                        echo"</td></tr></table>";
            }
        ?>
    </body>
</html>
