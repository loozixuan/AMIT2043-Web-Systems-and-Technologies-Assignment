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
        <meta name="author" content="lazy type">
        <meta name="keywords" content="Kwong Tat,watch">
        <link href="editProduct.css" rel="stylesheet">
        <title>Kwong Tat Watches Store</title>       
        <style>          
        </style>
    </head>
    <body>
          <div class="search">
            <?php
                require ("searchBar.php");
            ?>
       </div>
        <div class="mainBody">
            <div class="header" style=" background: #333;height: 1350px;">
                <?php
                require ("index.php");
                ?>
            </div>
           <?php

           require('mysqli_connect.php');

            $code2="";
            $code2=$_REQUEST['code'];


          if(isset($_POST['submit'])){
               //array for error
               $errors=[];

               // Check for a product name:
            if (empty($_POST['prod_name'])) {
                    $errors[] = 'You forgot to enter new product name.';
            } else {
                    $pn = mysqli_real_escape_string($dbc, trim($_POST['prod_name']));
            }

            // Check for price:
            if (empty($_POST['price'])) {
                    $errors[] = 'You forgot to enter new price.';
            } else {
                    $p = mysqli_real_escape_string($dbc, trim($_POST['price']));
            }


            // Check for product description:
            if (empty($_POST['prod_desc'])) {
                    $errors[] = 'You forgot to enter new product description.';
            } else {
                    $pd = mysqli_real_escape_string($dbc, trim($_POST['prod_desc']));
            }

            //check upload picture
            $pic1=$pic2=$pic3=$uploadOk="";
            $imageName=array();

            if(isset($_FILES['fileToUpload'])){
            $target_dir = "uploads/";

            $uploadOk = 1;
            $total=count($_FILES['fileToUpload']['name']);

             for($i=0;$i<$total;$i++){
                $target_file[$i] = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);

            if (file_exists($target_file[$i])) {
               $errors[] = 'Sorry, file already exists.';

              $uploadOk = 0;

            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] [$i]> 500000) {
           $errors[] = 'Sorry, your file is too big.';
              $uploadOk = 0;
            }

             }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
           $errors[] = 'Sorry, your file was not uploaded.';
            // if everything is ok, try to upload file
            } else {
                for($i=0;$i<$total;$i++){
                    $tmpFilePath=$_FILES['fileToUpload']['tmp_name'][$i];
                    if($tmpFilePath!=""){

                        $newFilePath="./uploads/" . $_FILES['fileToUpload']['name'][$i];
              if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $imageName[$i]=  "../server/uploads/".( $_FILES["fileToUpload"]["name"][$i]);

              } else {
                   $errors[] = 'Sorry, there was an error uploading your file.';

              }
                    }
                }
            }
             }

            for ($i=0; $i < count($imageName); $i++){ 
               $pic1=$imageName[0];
               $pic2=$imageName[1];
               $pic3=$imageName[2];
                }

          }
           ?>        
            
            <div class="editForm">
               
                <style>
                    .formAdd label{
                        padding:0px;
                        margin-right: 1%;
                    }
                  input[type="text"] {
                      width:40%;
                      height:35px;
                  }
                
                    input[type="submit"], input[type="button"],input[type="file"],input[type="reset"]{
                        border-radius: 3px;
                        padding: 10px;
                        margin: 10px 20px 10px 0px;
                    }
                    input[type="submit"],input[type="reset"]{
                        background-color:#093579;
                        color: white;
                        padding: 10px;
                        width:10%;
                    }

                    input[type='submit']:hover{
                       background-color:greenyellow;
                    }
                    input[type="reset"]:hover{
                         background-color:rgb(134, 7, 7);
                    }
                
                    .formAdd textarea {
                    width: 40%;
                    height: 100px;
                    padding: 12px 20px;
                    box-sizing: border-box;
                    border: 2px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                    resize: none;
                  }
                 
                </style>
                 <?php
             
              $sql="SELECT * FROM product where code='$code2'";
              $r=mysqli_query($dbc,$sql);
              while($row = $r->fetch_assoc()){
            ?>     
                <form enctype="multipart/form-data" action="editProduct.php" method="post" id="form">
                    <p style="margin-top: 10px;background-color:#F0F0F0;width:97%;padding:14px;margin-left: -50px;font-size: 17px;border-radius: 5px;color:grey;">Home / Product / <a href="editProduct.php" style="background-color:#F0F0F0;color:green">Edit Product</a></p><br><br>
                
                    <h1 class="banner" STYLE="background-image: linear-gradient(to right top, #1b21f4, #0076ff, #00a9ff, #00d3ff, #36f8ff);padding:14px;color:white;border: 2px solid black;border-radius: 4px;font-size: 20px;margin-left: -4%;">Edit Product Information</h1>
                     <?php
                  if(isset($_POST['submit'])){
            //if empty errors
            if(empty($errors)&&$uploadOk == 1){            
                // make and run query
                $sql="update product SET prod_name='$pn',price=$p,pic_name1='$pic1',pic_name2='$pic2',pic_name3='$pic3',prod_desc='$pd' where code='$code2'";
                $r= mysqli_query($dbc, $sql);

                if (mysqli_affected_rows($dbc) == 1) {          
                   echo"<table id='successful' style='margin-top:30px;margin-bottom:30px;margin-left:30px;border:3px solid black;width:90%;border-radius:5px;'><tr><td>";
                        echo '<h1 style="text-align:center;color:green">Edit Successfully</h1>
                        <p style="font-size:19px;text-align:center;">Product '. $code2 .' has been edited successfully.<br></p>';
                        echo"<a href='viewProduct.php' style='display:flex;justify-content:center;font-size:17px; background-color:white;margin-botttom:30px;'> View Product List</a>";
                       echo"</td></tr></table>";
                } else {
                   echo"<table id='errorEdit' style='margin-top:50px;margin-left:20px;border:3px solid black;width:35%;border-radius:5px;'><tr><td>";
                      echo '<h1 style="text-align:center;"You cannot edit this product due to some errors.</h1>';
                   echo"</td></tr></table>";
                }
            }else { 
                $errPic='<i class="fa fa-exclamation-triangle" style="color:red;"></i>';
                echo"<div class='error'>";
                    foreach ($errors as $msg) { 
                            echo "<table class='error'><tr><td>$errPic <b>$msg</b></td></tr></table>";
                    }	
                echo"</div>";

            } 	           
           }   
                ?>
                    <br><div class="formAdd">          
                    <label for='code'>Product Code  :   </label>
                    <input name='code' type='hidden' value='<?php echo $code2 ?>'><label class="input1" style="margin-left: 30px;"><?php echo $row['code']; ?></label>
                    </div><br>
                    <div class="formAdd">
                        <label for="Gender">Gender :</label>
                        <label class="input1" style="margin-left: 85px;"><?php echo $row['gender']; ?></label>
                    </div><br>
                     <div class="formAdd">
                    <label for="prodName">Product Name :</label>
                    <input style="margin-left: 25px;"class="input1" name="prod_name" type="text" placeholder="Product Name" value="<?php if(isset($_POST['prod_name'])) echo $_POST['prod_name']?>"><br>
                     </div><br>
                     <div class="formAdd">
                    <label for="prodPrice">Price :</label>
                    <input style="margin-left: 100px;" class="input1" name="price" type="text" placeholder="Price" value="<?php if(isset($_POST['price'])) echo $_POST['price']?>"><br>
                     </div>
                    <div class="formAdd"><br>
                        <label for="picName">New Picture1 :</label>
                        <input style="margin-left: 25px;" class="input2" type="file" name="fileToUpload[]">
                    </div>
                    <div class="formAdd">
                        <label for="picName">New Picture2 :</label>
                        <input style="margin-left: 25px;" class="input2" type="file" name="fileToUpload[]">
                    </div>
                    <div class="formAdd">
                        <label for="picName">New Picture3 :</label>
                        <input style="margin-left: 25px;" class="input2" type="file" name="fileToUpload[]">
                    </div>
                     <div class="formAdd">
                    <label for="desc" >Description :</label><textarea style="margin-left: 49px;" class="input1" name="prod_desc" placeholder="Description" value="<?php if(isset($_POST['prod_desc'])) echo $_POST['prod_desc'];?>"></textarea><br>
                     </div>
                     <div class="button" style="margin-bottom: 30px;">
                        <input class="input2" type="submit" name="submit" value="Submit" style=" padding: 7px;font-size: 20px;cursor: pointer;">
                        <input class="input2" type="reset" name="cancel" value="Reset" style=" padding: 7px;font-size: 20px;cursor: pointer;">
                    </div>  
                </form>
                 <?php
             }
              
             mysqli_close($dbc); // Close the database connection.
            ?>
            </div>
    </div>
    </body>
</html>
