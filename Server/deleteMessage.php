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
        <link href="deleteMessage.css" rel="stylesheet">        
    </head>
    <body>
        <div>
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
        $sql="select * FROM message where email='$email'";
        $result= $dbc->query($sql);
        while($row = $result->fetch_assoc()!== null){
            echo"<tr><td>{$row['email']}</td><td>{$row['name']}</td><td>{$row['phoneNo']}</td><td>{$row['comment']}</td></tr>";         
        }
         $msg="";
      if(isset($_POST['submit'])){
           $sql="update message set status='unavailable' WHERE email='$email'";
           $result=$dbc->query($sql);
          
    }           
        ?>
            <style>
                #msg{
                    display: flex;
                    justify-content: center;
                    color:red;
                    margin-top: 0;
                    font-size: 25px;
                }
            </style>
        
        <?php
          $q="SELECT * FROM message where email='$email'";
          
          $r=mysqli_query($dbc,$q);
           while($row = $r->fetch_assoc()){
        ?>  
            
        <form action="deleteMessage.php" method="post" class="delete">
            <p style="background-color:#F0F0F0;width:97%;padding:16px;margin-left: 3px;font-size: 17px;border-radius: 5px;color:grey;">Home / Message / <a href="deleteMessage.php" style="background-color:#F0F0F0;color:green">Delete Message</a></p>
            <h2 style="background-image: linear-gradient(to right top, #1b21f4, #0076ff, #00a9ff, #00d3ff, #36f8ff);">Delete Message</h2>
            <div class="paper" style=" width: 700px;"><br>
                
            <label for='name'><b>Customer Name  :   </b></label><span><?php echo $row['name']; ?></span><br><br>
            <label for='email'><b>Email :   </b></label><input name='email' type='hidden' value='<?php echo $email ?>'><span><?php echo $row['email']; ?></span><br><br>
            <label for='phoneNo'><b>Phone Number         :   </b></label><span><?php echo $row['phone']; ?> </span><br><br>
            <label for="message"><b>Message      :   </b></label><span><?php echo $row['comment']; ?> </span><br>    <br>
            <label for="message"><b>Status      :   </b></label>
            <?php if($row['status']=="unavailable"){?>
            <span style="color:red"><?php echo $row['status']; ?> </span>
            <?php
            }else{?>
            <span style="color:blue"><?php echo $row['status']; ?> </span>
            <?php
            }
            ?>
            <br><br><input id="delete" type='submit' name='submit' value='Delete' onclick="return confirm('Confirm delete this message?');">
            
            </div>
            <div id="msg"><?php echo $msg?></div>
        </form>
             
        <?php
     
           }
    ?> 
               </div>
    </body>
</html>
