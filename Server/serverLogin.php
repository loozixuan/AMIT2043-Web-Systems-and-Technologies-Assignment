<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Loo Zi Xuan">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>
    <style>
         @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            .myAccount{
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 40px;
                border: 4px solid;
                border-image-source: linear-gradient(45deg, rgb(0,143,104), rgb(250,224,66));
                border-image-slice: 1;
                width:500px;
                height:550px;
                background-image: url("adminBg.png");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            
            table a{
                text-decoration: none;
                 color: blue;
                 font-size: 1em;
            }
            h2{
              padding-right: 40px;
              padding-left:40px;
             }
            .signInLogo{
                margin : 40px auto 20px auto;
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
            label{
               font-size: 1.1em;
            }

            input{
                  width: 100%;
                 padding: 5px 15px;
                 margin: 4px 0;
                 display: inline-block;
                 border: 1px solid #ccc;
                 border-radius: 4px;
                 box-sizing: border-box; 
                
            }
            input:focus{
                 border: 3px solid rgb(102, 255, 255);
            }
       
           input[type='submit'], input[type="reset"]{
             border-radius: 3px;
             padding: 8px;
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
              .myAccount{
                  margin:10px;
              }
              h2{
              padding-right: 10px;
              padding-left:10px;
            }       
          }
          body{
            background-image: url("loginBg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
          }
          
          .error{
              font-style:italic;
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
          .myAccount:hover{
              transform: scale(1.02);
               border-radius: 10px;
               transition-duration: 0.4s;
          }
          #sign{
              color:black;
          }
          #sign:hover{
              color:red;
          }
        </style>
        
    </head>
    <body style="margin-top: 45px;"> 
        <?php
       require('mysqli_connect.php'); // Connect to the db.
       session_start();
       
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          //extract username, email and password
          $errors = []; // Initialize an error array.

	// Check for a name:
       $pName="^[a-zA-Z0-9_]*$^";
	if (empty($_POST['name'])) {
		$errors[]= 'You forgot to enter your name.';
	} else {
            if(preg_match($pName,$_POST['name'])){
		  $n = mysqli_real_escape_string($dbc,trim($_POST['name']));
            }else{
                $errors[]= 'User name must start with letter and consists of letters and numbers only';
            }
	}
	
	// Check for an email address:
        $pEmail="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^";
	if (empty($_POST['signEmail'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
            if(preg_match($pEmail,$_POST['signEmail'])){
		$e = mysqli_real_escape_string($dbc, trim($_POST['signEmail']));
            }else{
                 $errors[]= 'Wrong email format.';
            }
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['signPassword'])) {
            $pattern="^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,15}$^";
            if(preg_match($pattern, $_POST['signPassword'])){
		$p = mysqli_real_escape_string($dbc, trim($_POST['signPassword']));
            }else{
                $errors[] = 'Password requires 6-20 characters including at least 1 upper and lower alpha, and 1 digit.';
            }
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
       
      if (empty($errors)) { 
         $sql="SELECT name from admin WHERE name='{$n}' AND email='{$e}' AND password=SHA2('$p', 512)";
         $r = mysqli_query($dbc,$sql);
         $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
       
         $count= mysqli_num_rows($r);
         
         //if result matched 
         if($count==1){
             $_SESSION['login_user'] = $n;
             
             header("location: homeServer.php");
         }else{
             echo '<table class="box" style="padding:8px;margin-top:40px;"><tr><td><i class="fa fa-exclamation-triangle"></i> Your username or email or password wrong. Please try again</td></tr></table>';
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
       mysqli_close($dbc); // Close the database connection. 
        ?>
        <br><br>
        
        <div class="myAccount">
            <div class="signInLogo">
                <img src="../Sharing/image/logo.png" alt="smallLogo"/>   
            </div>
            <form action="serverLogin.php" method="post">
                <table>
                    <tr><td><h2> Administrator Area</h2></td></tr>
                    <tr><td><label>User Name:</label></td></tr>
                    <tr><td><input type="text" name="name" placeholder="User Name" ></td></tr>
                    <tr><td><label for="signEmail">Email:</label></td></tr>
                    <tr><td><input type="email" name="signEmail" placeholder="Email"></td></tr>
                    <tr><td><label>Password:</label></td></tr>
                    <tr><td><input type="password" name="signPassword" placeholder="Password"></td></tr>
                    <tr ><td style="padding-top:20px;"> <input style="margin-right:10px;" type="submit" name="submit" value="Log In"/></tr>
                    <tr><td style="display:flex;justify-content: center;">Haven't sign up? <a href="serverSignUp.php" id="sign"><span style="margin-left:8px;">Sign up</span></a></td></tr>
                    <tr><td style="text-align: center;"><a href="resetPassword.php">Forgot password?</a></td></tr>   
                </table>       
            </form>
        </div>
    </body>
</html>
