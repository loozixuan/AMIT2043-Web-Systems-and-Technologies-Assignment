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
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
        <style>
            .mainBody{
                display: flex;
                box-sizing: border-box;
            }                 
            .header{
               width: 19%;
               box-sizing: border-box;                
               min-height: 100%;               
              background: #333;
            }         
            .main{
                width: 79%;
                box-sizing: border-box;
            }
            #form {
                  max-width: 700px;
                  padding: 2rem;
                  box-sizing: border-box;
            }

            .form-field {
              display: flex;
              margin: 0 0 1rem 0;
            }
            label, input {
              width: 70%;
              padding: 0.5rem;
              box-sizing: border-box;
              justify-content: space-between;
              font-size: 1.1rem;
            }
            textarea{
              width: 70%;
              padding: 2.5rem;
              box-sizing: border-box;
              justify-content: space-between;
              font-size: 1.1rem;
            }
            label {
              text-align: center;
              width: 30%;
            }
            input,textarea {
              border: 2px solid #aaa;
              border-radius: 2px;
            }
            input[type="submit"]{
              width: 30%;
              padding: 0.5rem;
             display:block;
             margin-left: auto;
             margin-right: auto;
              font-size: 1.1rem;
              cursor: pointer;
            }
            form h2{
                background-color: green;
                color: white;
                text-align: center;
                padding:10px;
                border-radius: 3px; 
                border: 2px solid black;
            }
           
        </style>
    </head>
    <body>
        <div class="search">
            <?php
                require ("searchBar.php");
            ?>
       </div>
              <div class="mainBody">
                   <div class="header" style="height:800px;">
                        <?php
                        require ("index.php");
                        ?>
                   </div>
                  <?php
                  require('mysqli_connect.php');
                  $email="";
                  $email=$_REQUEST['email'];
                  $sender="";
                  $sender="loozx-wm19@student.tarc.edu.my";               
               if(isset($_POST['submit'])){
                    $to = $email;
                    $subject = 'Reply Message from Kwang Tat Watch Store';
                    $reply = $_POST['reply'];
                    $headers ="From: loozx-wm19@student.tarc.edu.my";
                    mail($to, $subject, $reply, $headers);  
               }
                  ?>
                  
                  <div class="main">
                      <p style="background-color:#F0F0F0;width:93%;padding:16px;margin-left: 38px;font-size: 17px;border-radius: 5px;color:grey;">Home / Message / <a href="replyEmail.php" style="background-color:#F0F0F0;color:green">Reply Message</a></p>
                       <?php
                          $q="SELECT * FROM message where email='$email'";
                          $r=mysqli_query($dbc,$q);
                           while($row = $r->fetch_assoc()){
                        ?>  
                      <form method="post" action="replyEmail.php" id="form" class="validate">
                        <h2>Reply Customer Message</h2>
                        <div class="form-field">
                            <label for="email">To:</label>
                            <input type="email" name="email" id="email" value='<?php echo $email ?>'/>
                        </div>
                        <div class="form-field">
                            <label for="send">From: </label>
                            <input type="email" name="sender" id="emailSender" value='<?php echo $sender ?>' />
                        </div>
                        <div class="form-field">
                            <label for="question">Question Ask: </label>
                            <input type="text" name="ask" id="ask" value='<?php echo $row['comment'] ?>' />
                        </div>
                        <div class="form-field">
                            <label for="reply">Reply Message: </label>
                            <textarea id="message" class="input100" name="reply"><?php if(isset($_POST['reply'])) echo $_POST['reply']?></textarea>
                        </div>
                        <div class="form-field">
                            <label for=""></label>
                            <input type="submit" name="submit" value="Reply Message" />
                        </div>
                    </form>
                          <?php
     }
    ?> 
                  </div>
              </div>
  
    </body>
</html>
