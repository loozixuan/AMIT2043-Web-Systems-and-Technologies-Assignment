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
            body{
            background-image: url("loginBg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
          }
         
            .beMember{
                margin:20px auto 40px auto;
                border: 4px solid;
                border-image-source: linear-gradient(45deg, rgb(0,143,104), rgb(250,224,66));
                border-image-slice: 1;
                width:400px;
                height:550px;
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
                font-size: 1.1em;
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
                font-size: 1.2em;
            }
            input:focus{
                 border: 3px solid rgb(102, 255, 255);
            }
       
            input[type="submit"], input[type="reset"]{
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
         input[type='reset']:hover{
             color:white;
             background-color:rgba(0, 0, 75, 0.3);
          }
           @media only screen and (max-width: 640px){
              .beMember{
                  margin:10px;
              }      
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
          .beMember:hover{
               transform: scale(1.02);
               border-radius: 10px;
               transition-duration: 0.4s;
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
        </style>     
    </head>
    <body style="margin-top: 45px;">
    <?php
    // Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require('mysqli_connect.php'); // Connect to the db.

	$errors = []; // Initialize an error array.

	// Check for a name:
        $pName="^[a-zA-Z0-9_]*$^";
	if (empty($_POST['name'])) {
		$errors[]= 'You forgot to enter your name.';
	} else {
            if(preg_match($pName,$_POST['name'])){
		$n = mysqli_real_escape_string($dbc, trim($_POST['name']));
            }else{
                $errors[]= 'User name must consists alphanumeric and underscore only';
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
		if ($_POST['signPassword'] != $_POST['confirmPassword']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
                    
			$p = mysqli_real_escape_string($dbc, trim($_POST['signPassword']));
		}
            }else{
                $errors[] = 'Password requires 6-20 characters including at least 1 upper and lower alpha, and 1 digit.';
            }
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	if (empty($errors)) { 

		// Register the user in the database...

		// Make the query:
		$q = "INSERT INTO admin (name, email, password , registration_date) VALUES ('$n', '$e', SHA2('$p', 512), NOW() )";
		$r = mysqli_query($dbc, $q); // Run the query.
		if ($r) { 
                   echo"<table id='success'><tr><td><img src='tick.png'/>";
				echo '<h1>Successful registration</h1>
				<p style="font-size:19px;">Your account has been created successfully.<br></p>';
                                echo"<a href='serverLogin.php' style='font-size:17px;'> Sign in</a>";
                        echo"</td></tr></table>";
		} else {
			 echo"<table class='error2'><tr><td><img src='alert.png'/>";
				echo '<h1>System Error</h1>
				<p style="font-size:18px;">You cannot register due to some errors. We apologize for any inconvenience.<br></p>';
                                echo"<a href='serverLogin.php' style='font-size:17px;'> Go back to sign up form</a>";
                             echo"</td></tr></table>";
		} 
		mysqli_close($dbc); // Close the database connect
		exit();
	} else { 
            $errPic='<i class="fa fa-exclamation-triangle"></i>';
            echo"<div class='box'>";
		foreach ($errors as $msg) { 
			echo "<table class='error'><tr><td>$errPic <b>$msg</b></td></tr></table>";
		}	
            echo"</div>";
	} 
	mysqli_close($dbc); // Close the database connection.
}   
   ?>  
        <br>
        <div class="beMember">  
            <div class="signInLogo">
                <img src="../Sharing/image/logo.png" alt="smallLogo"/>     
            </div>
            <form action="serverSignUp.php" method="post">
                <table>
                    <tr><td>Already an admin?<a href='serverLogin.php'> <i>Login</i></a> </td></tr>
                    <tr><td><label>User Name:</label></td></tr>
                    <tr><td><input type="text" name="name" maxlength="25" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="User Name"></td></tr>
                    <tr><td><label for="signEmail">Email:</label></td></tr>
                    <tr><td><input type="email" name="signEmail" maxlength="50" placeholder="Email" value="<?php if (isset($_POST['signEmail'])) echo $_POST['signEmail']; ?>"></td></tr>
                    <tr><td><label>Password:</label></td></tr>
                    <tr><td><input type="password" name="signPassword" maxlength="20" placeholder="Password" value="<?php if (isset($_POST['signPassword'])) echo $_POST['signPassword']; ?>"></td></tr>
                    <tr><td><label>Confirm Password:</label></td></tr>
                    <tr><td><input type="password" name="confirmPassword" maxlength="20" placeholder="Confirm Password" value="<?php if (isset($_POST['confirmPassword'])) echo $_POST['confirmPassword']; ?>"></td></tr>
                    <tr ><td style="padding-top:20px;"> <input style="margin-left:20px;" type="submit"  value="Sign Up"/><input type="reset"  value="Cancel"/></td></tr>
                </table>     
            </form>
            </div>     
    </body>
</html>
