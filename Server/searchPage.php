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
        <link href="../Sharing/base.css" rel="stylesheet">
        <title>Kwong Tat Watches Store</title>
        <style>
           
            @font-face{
              font-family: p;
              src: url(FrankRuhlLibre-Light.ttf);
            }
            table#productView{              
              border-collapse: collapse;
              text-align: center;
            }
            
            table#productView tr:nth-child(even) 
            {background-color: #f2f2f2;
            }
            
            table#productView th{
                font-size: 18px;
                text-align: center;
                padding-left: 7px;      
                padding-right: 7px; 
                background-image: linear-gradient(to bottom, #17206c, #36468c, #566daa, #7c96c7, #a6bfe3);
                color:white;
                font-family: p;
            }
            
            #productView tr,td{
                padding-top: 3px;
            }
            
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
                width: 80%;
                box-sizing: border-box;
            }
            #productView  a img{
                background-color:white !important;
            }
            .number a{
                background-image: radial-gradient(circle, #19fff7, #77feff, #bdfaff, #ecf9ff, #ffffff);
            }
            #xFound{
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 55px;
            }
            #productView img{
               width:55%; 
            }
            #try{
                display: flex;
                justify-content: center;
                font-size: 20px;
                color:green;
            }
        </style>
    </head>
    <body>    
        <div>
            <?php
                require ("searchBar.php");
            ?>
       </div>
       <div class="mainBody">        
           <div class="header" style="height:1600px;">
                <?php
                require ("index.php");
                ?>
            </div>
            <div class="main">
                <table id="productView" style="width:95%;margin-top:30px;  margin-left: 35px;margin-bottom: 50px;">
               
            <?php
                 
                require('mysqli_connect.php');
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $q="SELECT * FROM product WHERE prod_name LIKE '%$search%' OR brand LIKE '%$search%' OR gender LIKE '%$search%' OR code LIKE '%$search%'";
                    $result=mysqli_query($dbc,$q);
                    $num=mysqli_num_rows($result);
                       if($result->num_rows>0){
                           echo"<tr>";                     
                                echo"<th>Product Code</th>";
                                echo"<th style='padding: 6px'>Product Name</th>";
                                echo"<th>Price (RM)</th>";
                                echo"<th>Gender</th>";
                                echo"<th>Brand</th>";
                                echo"<th>Quantity</th>";
                                echo"<th>Picture</th>";
                                echo"<th>Product Description</th>";
                                echo"<th>Action</th>";
                           echo"</tr>";
                           while($row = $result->fetch_assoc()){                             
                               echo"</tr><td>{$row['code']}</td><td>{$row['prod_name']}</td><td>{$row['price']}.00</td><td>{$row['gender']}</td><td>{$row['brand']}</td><td>{$row['quantity']}</td><td><img src='{$row['pic_name1']}' style='width:55%;display:block;margin-left:auto;margin-right:auto;'/></td><td>{$row['prod_desc']}</td>"
                                . "<td style='padding:15px;'><a href='editProduct.php?code={$row['code']}'><img src='images/edit.png'/></a><a href='deleteProduct.php?code={$row['code']}'><img src='images/delete.png'/></a></td></tr>";                 
                           }
                        if($num>0){
                           echo"<tr class='number' style='text-align:center;background-image: radial-gradient(circle, #19fff7, #77feff, #bdfaff, #ecf9ff, #ffffff);padding:15px;'><td colspan='9'><b>Number of Records in Product List: $num </b> [<a href='addProduct.php'>Add Product</a>]</td></tr>";
                        }else{
                           echo"<tr class='number' style='text-align:center;background-color:lightblue;><td colspan='9'>There are currently dont have any student</td></tr>";
                        }
                       }else{
                           echo'<img id="xFound" src="images/notFound.png">'; 
                           echo'<p id="try">Please try to use other keyword to continue searching...</p>';
                       }
                    $dbc->close();
                } 
                
                
                
            ?>
                </table>
                
            </div>
             </div>
       
    </body>
</html>
