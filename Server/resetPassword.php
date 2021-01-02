<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrator Page</title>
         <style>
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            body{
            background-image: url("loginBg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
          }
         
            .change{
                margin:50px auto 40px auto;
                border: 4px solid;
                border-image-source: linear-gradient(45deg, rgb(0,143,104), rgb(250,224,66));
                border-image-slice: 1;
                width:400px;
                height:50%;
                background-image: url("adminBg.png");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
           
            .signInLogo{
                margin : 20px auto 20px auto;
                box-sizing: border-box;
                width:160px;
            }
            .signInLogo img{
                width:100%;
            }

            table{    
                margin-right: auto;
                margin-left: auto;
            }
            table a{
                 text-decoration: none;
                 color: blue;
                 font-size: 1em;
            }
            label{
                font-size: 1em;
            }

            input[type=text],input[type=email],input[type=password]{
                 width: 100%;
                 padding: 5px 15px;
                 margin: 4px 0;
                 display: inline-block;
                 border: 1px solid #ccc;
                 border-radius: 4px;
                 box-sizing: border-box; 
                
            }
            input[type=radio]{
                font-size: 1.1em;
            }
            input:focus{
                 border: 3px solid rgb(102, 255, 255);
            }
       
            input[type="submit"]{
             border-radius: 3px;
             padding: 10px;
             margin: 5px 5px 5px 0px;
            }
            input[type="submit"]{

              background-color:#093579;
              color: white;
            }

           input[type='submit']:hover{

             background-color:rgb(134, 7, 7);
            }
       
           @media only screen and (max-width: 640px){
              .beMember{
                  margin:10px;
              }      
          } 
          
          .error{
              font-style:normal;
              font-size: 16px;
              margin:10px;
          }
          .box{
                border:1px solid black;
                border-radius: 8px;
                width:500px;
                display: block;
                background: linear-gradient(90deg, rgba(247,197,219,1) 0%, rgba(255,255,255,1) 100%);
                 box-shadow: 3px 6px 13px #e32525;
                margin-left: auto;
                margin-right: auto;
          }
          .change:hover{
               transform: scale(1.02);
               border-radius: 10px;
               transition-duration: 0.4s;
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
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require('mysqli_connect.php'); // Connect to the dba.
            $errors = []; // Initialize an error array.
        
       // Check for an email address:
	if (empty($_POST['signEmail'])) {
		$errors[] = 'email address cannot be empty.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['signEmail']));
	}
          
        // Check new password:
         $pattern="^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,15}$^";
	if (empty($_POST['signPassword'])) {
		$errors[] = 'new password cannot be empty.';
	} else {
            if(preg_match($pattern,$_POST['signPassword'] )){
		$p = mysqli_real_escape_string($dbc, trim($_POST['signPassword']));
            }else{
                $errors[] = 'Password requires 6-20 characters including at least 1 upper and lower alpha, and 1 digit.';
            }
	}

	// Check for a new password and matched
	// against the confirmed password:
	if (!empty($_POST['confirmPassword'])) {
		if ($_POST['signPassword'] != $_POST['confirmPassword']) {
			$errors[] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['confirmPassword']));
		}
	} else {
		$errors[] = 'confirm password cannot be empty.';
	}
            
          if(empty($errors)){
              $q="select email from admin WHERE email='{$e}'";
              $r = @mysqli_query($dbc, $q);
              $num = @mysqli_num_rows($r);
                if ($num == 1) { 
                    $row = mysqli_fetch_array($r, MYSQLI_NUM);
                    $q="update admin SET password=SHA2('$p', 512) WHERE email='{$row[0]}'";
                    $r = @mysqli_query($dbc, $q);
                    
                    if (mysqli_affected_rows($dbc) == 1) { 
                        echo"<table id='success'><tr><td><img src='tick.png'/>";
				echo '<h1>Password change successful</h1>
				<p style="font-size:19px;">Your password has been changed successfully.<br></p>';
                                echo"<a href='serverLogin.php' style='font-size:17px; background-color:white;'> Go back to login form to sign in</a>";
                        echo"</td></tr></table>";
                          
			} else { 
			     echo"<table class='error2'><tr><td><img src='alert.png'/>";
				echo '<h1>System Error</h1>
				<p style="font-size:18px;">Your password could not be changed due to a system error. We apologize for any inconvenience.<br></p>';
                                echo"<a href='serverLogin.php' style='font-size:17px; background-color:white;'> Go back to login form</a>";
                             echo"</td></tr></table>";
			}
			mysqli_close($dbc); 
                        exit();
                }else { 
			echo '<table class="box" style="padding:8px;margin-top:40px;"><tr><td><i class="fa fa-exclamation-triangle"></i> Username doesn\'t exist. Please try again.</td></tr></table>';
		}
          }else{
              $errPic='<i class="fa fa-exclamation-triangle"></i>';
            echo"<div class='box'>";
		foreach ($errors as $msg) { 
			echo "<table class='error'><tr><td>$errPic <b>$msg</b></td></tr></table>";
		}	
            echo"</div>";
          }   
        }
        ?>
    <div class="change">
        <div class="signInLogo">
                <img src="../Sharing/image/logo.png" alt="smallLogo"/>     
        </div>
        <h3 style="text-align:center;">Reset Password</h3>
        <form action="resetPassword.php" method="post">
            <table>
            <tr><td><label for="signEmail">Email Address:</label></td></tr>
            <tr><td><input type="email" name="signEmail" maxlength="50" value="<?php if (isset($_POST['signEmail'])) echo $_POST['signEmail']; ?>"></td></tr>
            <tr><td><label>New password:</label></td></tr>
            <tr><td><input type="password" name="signPassword" maxlength="20"  value="<?php if (isset($_POST['signPassword'])) echo $_POST['signPassword']; ?>"></td></tr>
            <tr><td><label>Confirm new Password:</label></td></tr>
            <tr><td><input type="password" name="confirmPassword" maxlength="20" value="<?php if (isset($_POST['confirmPassword'])) echo $_POST['confirmPassword']; ?>"></td></tr>
            <tr ><td style="padding-top:20px;"><input style="margin-left:32px;" type="submit"  name="submit" value="Save changes"/></td></tr>   
            </table>
        </form>
    </div>
    </body>
</html>
