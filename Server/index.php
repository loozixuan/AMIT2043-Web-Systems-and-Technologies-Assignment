<html>
    <head>
        <meta charset="UTF-8">        
        <title></title>
        <link href="index.css" rel="stylesheet">
        <style>
            a{
                text-decoration: none;
                 background-color: #333;
            }
            
            .navAdmin ul li a{
                 background-color: #333;
            }
            .navAdmin ul li a:hover{
                 background-color: #333;
            }
        </style>
    </head>
    
    <body>
          <nav class="navAdmin">
                <?php
                 include('session.php');

                 if(isset($_SESSION['login_user'])){             
                 echo"<p id='userName' style='color:white;margin-left:25px;margin-top:25px;'><img src='login.png' style='margin-top:25px;'/><span style='margin-left:18px;font-size:16px;'>Welcome, {$_SESSION['login_user']}</span><p>";               
                 }else{
                    echo"<p id='userName'><img src='user.png' /> <br><a href='serverSignUp.php'> Sign up</a> <p>";   
                 }
                ?>                    
              <a></a>

              <br><br>
            <ul>
              <li><span style="font-size:23px;">Admin Panel</span></li>
              <li><a class="active" style="font-size:16px;" href="homeServer.php"> Home</a></li>
              <li><a style="font-size:16px;" href="viewMessage.php"> Inbox</a></li>
              <li><a style="font-size:16px;" href="viewProduct.php"> Product List</a></li>
              <li><a style="font-size:16px;" href="addProduct.php"> Insert Product</a></li>
              <li><a style="font-size:16px;" href="customerOrder.php"> Orders</a></li>
              <li><a style="font-size:16px;" href="viewUserInfo.php"> User Info</a></li>
              <li><a style="font-size:16px;" href="logout.php"> Logout</a></li>
            </ul>
          </nav> 
   
    </body>
</html>
