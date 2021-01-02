<?php
       session_start();
      ?>
<!DOCTYPE html>

<html>
    <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lee Sin Meai">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>
    </head>
    <body style="margin-top: 45px;">
        <?php
        $conn=new mysqli("localhost","root","","wst");
            if($conn === false){
            die("ERROR: Could not connect. " . $conn->connect_error);
              }
            $emailErr=$passwordErr=$err=$Logpassword_ecoded="";
        //check email
         if($_SERVER['REQUEST_METHOD']=='POST'){
             if(empty($_POST['Logemail'])){
                      $emailErr = "Please enter your email address.";     
             }
             else{
             $email=$_POST['Logemail'];
             $duplicateID= mysqli_query($conn, "select * from user where email='$email'");
             if(mysqli_num_rows($duplicateID)==0){
                   $emailErr="The email that you're entered doesn't match any account.";
             }
             else{
                   $LogEmail=$_POST['Logemail'];   
             }
             }
             //check password
             if(empty($_POST['Logpassword'])){
                 $passwordErr="Please enter the Password.";
             }
             else{
             $LogEmail=$_POST['Logemail']; 
             $Logpassword= $_POST['Logpassword'];
             $Logpassword_ecoded=SHA1($Logpassword);
             $duplicateID= mysqli_query($conn, "select * from user where email='$LogEmail' AND password='$Logpassword_ecoded'");
             if(mysqli_num_rows($duplicateID)==0){
                   $passwordErr="The password that you're entered doesn't match this account.";
                   
             }
             else{
                
                 $Logpassword= SHA1($_POST['Logpassword']);
             }
             }
             if($emailErr==""&&$passwordErr==""){
            

             $name= mysqli_query($conn, "select name from user where email='$LogEmail' AND password='$Logpassword_ecoded'");
             $email= mysqli_query($conn, "select email from user where email='$LogEmail' AND password='$Logpassword_ecoded'");
             $name=mysqli_fetch_row($name);
             $email=mysqli_fetch_row($email);
             $name=$name[0];
             $email=$email[0];
                $_SESSION['name']=$name;
                $_SESSION['Logemail']=$email;
                header("Location:../Home/Home.php");
                exit();
                 
             
              
             }
            
           
             
         
         }
          mysqli_close($conn);
         $page_title='Login';
  include('../Sharing/header.php');
  ?>
        
        
        <link href="../Sharing/Login.css" rel="stylesheet">
        
        
        <div class="myAccount">
            <div class="col-1-3">
                
            </div>
            <div class="col-2-3">
            <div class="signInLogo">
                <img src="../Sharing/image/smallLogo.png" alt="smallLogo"/>
                
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <table>
                    <tr></tr>
                    <tr><td><h2 style="text-align:center;"> MY ACCOUNT </h2></td></tr>
                    <tr><td style="text-align:center;">Not a member?<a href='SignUp.php'>Join Us.</a> </td></tr>
                    <tr><td><label for="LogEmail">Email:</label></td></tr>
                    <tr><td><input type="text" name="Logemail" placeholder="Email" value="<?php if(isset($_POST['Logemail'])) echo $_POST['Logemail']?>"></td></tr>
                    <?php echo "<tr><td style='color:red;'>$emailErr</td></tr>"?>
                    <tr><td><label for="Logpassword">Password:</label></td></tr>
                    <tr><td><input type="password" name="Logpassword" placeholder="Password" value="<?php if(isset($_POST['Logpassword'])) echo $_POST['Logpassword']?>"></td></tr>
                    <?php echo "<tr><td style='color:red;'>$passwordErr</td></tr>"?>   
                    <tr><td><a href="../Sharing/resetPassword.php">Forgot password?</a></td></tr>
                    <tr ><td style="padding-top:20px;"> <input style="margin-right:10px;" type="submit" name="login" value="Log In"/></tr>
                    <input type="hidden" name="submitted" value="TRUE">
                     <tr><td><?php echo $err;?></td></tr>
                </table>
                
            </form>
            </div>
       
        </div>
       
        <?php
include('../Sharing/footer.php');
?>
      
    </body>
</html>