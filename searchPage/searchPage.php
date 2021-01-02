<?php
       session_start();
      ?>
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
        <title>Search Result</title>
        <link href="../Sharing/base.css" rel="stylesheet">
        <link href="../ProductCatalog/productCatalog.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="margin-top: 45px;">
        <style>
            .col-25{
                width:30%;
                float: left;
            }
            .col-25 img{
                  width:250px;
                  height:230px;
                  border-radius: 30px/10px;
            }
            .col-25 img:hover{
               transition: transform .65s ease;
               transform: scale(1.07);
               cursor:pointer;
            }
            .col-25:after{
                clear: both;
            }
            .col-25 a{
                text-decoration: none;
                color: white;
            }
             .col-25 a:hover{
                text-decoration: none;
                color: darkcyan;
            }
            .col-25 p{
            color: #ffae42;
            font-size: 15px;
            font-style: italic;
            }
            table a {
                text-decoration: none;
                color:black;
            }
            table a:hover{
                 text-decoration: none;
                color:lightsalmon;
            }
            button{
                float:left;
            }
             button:after{
                clear:both;
            }
            .card {
                border: 2px solid black;
                width:650px;
                height:45px;
                margin-top: 20px;
                padding:6px;
                text-align: center;
                background-color: #f44336;
                color: white;
            }
            #xA{
              
                margin-top:40px;
            }
            </style>
        <?php
           include('../Sharing/header.php');
        ?>
        <div class="row">
             <div class="col-1-3">
                <table class="sidebar" style="margin-left: 70px;margin-top: 45px;position: sticky;top:0">
                    <input type="hidden" name="filter">
                    <th>Product Catagory</th>
                    <tr><td><img src="../ProductCatalog/watch.png"/> Watch</td></tr>
                    
                    <?php
                        $brand=$_REQUEST['brand']??'';
                        $o=$_REQUEST['o']??'';                
                    ?>
                    <th> <br><br>Brand</th>
                    <tr><td><a href="../ProductCatalog/productPage.php"><input type="checkbox" value="A" onclick="window.location.href='productPage.php'" > All</a></td></tr>
                    <tr><td><a href="../ProductCatalog/productPage.php?brand=gshock"><input type="checkbox" value="GS" onclick="window.location.href='productPage.php?brand=gshock'"> G-shock</a></td></tr>
                    <tr><td><a href="../ProductCatalog/productPage.php?brand=orient"><input type="checkbox" value="O" onclick="window.location.href='productPage.php?brand=orient'"> Orient</a></td></tr>
                    <tr><td><a href="../ProductCatalog/productPage.php?brand=roscani"><input type="checkbox" value="R" onclick="window.location.href='productPage.php?brand=roscani'"> Roscani</a></td></tr>
                    
                    <th> <br><br> Price</th>
                    <tr><td><a href="../ProductCatalog/productPage.php?o=asc"><input type="checkbox" value="A"  onclick="window.location.href='productPage.php?o=asc'"> Low to High</a></td></tr>
                    <tr><td><a href="../ProductCatalog/productPage.php?o=desc"><input type="checkbox" value="D" onclick="window.location.href='productPage.php?o=desc'"> High to Low</a></td></tr>                   
                </table>
            </div>
            
        <div class="col-2-3">
            <h4 style="margin-top:45px;color:green;">Search Result(s) :</h4>
             <?php
               //product database
                 require_once("product.php");
                 $db_handle = new Product();
                             
               ?>
                    <!--Product Grid-->
                <section class="section-grid">
                <div class="grid-prod">              
                   <?php
                    $numProduct=0;
                    $search=$_POST['search']; 
                    $product_array = $db_handle->runQuery("SELECT * FROM product WHERE prod_name LIKE '%$search%' OR brand LIKE '%$search%' OR gender LIKE '%$search%'");
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                    ?> 
                    <div class="col-25" style="margin-top:25px;"><a href="../ProductDetails/productDetail.php?&code=<?php echo $product_array[$key]["code"];?>" ><img src="<?php echo $product_array[$key]["pic_name1"]; ?>"></a>                           
                            <h3><?php echo $product_array[$key]["prod_name"]; ?></h3>
                            <p><?php echo "RM".$product_array[$key]["price"].".00"; ?></p>
                            <button class="btn2" ><a href="../ProductDetails/productDetail.php?&code=<?php echo $product_array[$key]["code"];?>"> Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></button> 
                    </div>                   
                    <?php                                  
                        }
                    }
                     if (empty($product_array)){
                          echo'<img id="xA" src="xA.png">';
                     }
                    ?>  
                </div>       
                </section>
       </div>
        </div>   
        <?php      
        include('../Sharing/footer.php');
        ?>
    </body>
</html>
