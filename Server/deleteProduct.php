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
        <link href="deleteProduct.css" rel="stylesheet">
        <style>
            #successful table{
                display:block;
                margin-left: auto;
                margin-right: auto;
            }
            .mainBody{
                    display: flex;
                    box-sizing: border-box;
                }
                 
            .header{
               width: 21%;
               box-sizing: border-box;                
               min-height: 100%;               
               background: #333;
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
         
        $code="";
        $code=$_REQUEST['code'];
         
        $sql="select * FROM product where code='$code'";
        $result= $dbc->query($sql);
        while($row = $result->fetch_assoc()!== null){
            echo"<tr><td>{$row['code']}</td><td>{$row['prod_name']}</td><td>{$row['price']}</td><td>{$row['pic_name1']}</td><td>{$row['pic_name2']}</td><td>{$row['pic_name3']}</td><td>{$row['prod_desc']}</td></tr>";         
        }
        if(isset($_POST['submit'])){
               $sql="update product set status='unavailable' where code='$code'";
               $result=$dbc->query($sql);
            if($result){
                $color="red";
            }
        }                 
        ?>
             <style>
                .tableUser {
                  margin-left: 3.5%;
                  border-collapse: collapse;
                  width: 80%;
                }
                  .tableUser th{
                  text-align: center;
                  padding: 20px;
                  color:#101D5F;
                  font-style: normal;
                  font-size: 22px;
                } 
                .tableUser td {
                  border-top: 2px solid #dddddd;
                  text-align: center;
                  padding: 15px;
                  font-size: 16px;
                }
                .table{
                 border-radius: 6px;
                 padding:10px;
                 border:1px solid #dddddd;
                 width: 70%;
                 display: block;
                 margin-left: auto;
                 margin-right: auto;
                 height: 25%;
                 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                }
                .banner{
                font-size: 1.6em;
                background-color: rgba(0, 0, 75, 0.1);
                outline-color: rgba(0, 0, 75, 0.4);
                padding: 6px;
                margin-top:20px;
                margin-left: 15px;
                width:1100px;
                border-radius:5px;
            }
                   
             </style>
        <?php
          $q="SELECT * FROM product where code='$code'";
          $r=mysqli_query($dbc,$q);
          $color="blue";
           while($row = $r->fetch_assoc()){
        ?>     
             
        <form action='deleteProduct.php' method='post' id='delete'>
        <p style="background-color:#F0F0F0;width:93%;padding:14px;margin-left: 10px;font-size: 17px;border-radius: 5px;color:grey;">Home / Product / <a href="deleteProduct.php" style="background-color:#F0F0F0;color:green">Delete Product</a></p><br>
        <h3 class="banner" style="font-size: 30px;text-align:center;background-image: linear-gradient(to right top, #1b21f4, #0076ff, #00a9ff, #00d3ff, #36f8ff);color:white;border:2px solid black;padding:10px;">Delete Product</h3><br>   
          <div class="table">
            <table class="tableUser">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Gender</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Status</th>
                </tr>
                <tr>
                   <td><input name='code' type='hidden' value='<?php echo $code ?>'><?php echo $row['code']; ?>
                    <td><?php echo $row['prod_name']?></td>         
                    <td><?php echo $row['gender']?></td>               
                    <td><?php echo $row['price']?></td>              
                    <td><img src="<?php echo $row['pic_name1']?>" alt='watch' style="width:90%;"/></td>    
                   <?php if($row['status']=="unavailable"){?>
                    <td style="color:red"><?php echo $row['status']?></td>
                     <?php
                      }else{?>
                    <td style="color:blue"><?php echo $row['status']?></td>
                     <?php
                       }
                      ?>
                    <td><input style="cursor: pointer;margin: 4px 2px;background-color: #4CAF50;border: none;color: white; padding: 10px 22px; text-align: center; font-size: 16px;"class="button" type='submit' name='submit' value='Delete' onclick="return confirm('Are you sure you want to delete this product?');"></td>
                </tr>
            </table>
          </div>
        </form>   
    <?php
     }
    ?>    
         </div>
    </body>
</html>
