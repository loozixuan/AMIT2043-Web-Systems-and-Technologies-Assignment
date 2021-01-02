<?php
       session_start();
      ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Loo Zi Xuan">
        <meta name="keywords" content="Kwong Tat,watch">
        <title>Kwong Tat Watches Store</title>
        <link href="../Sharing/base.css" rel="stylesheet">
        <link href="productCatalog.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="productCatalog.js"></script>
        <style>
            .btn2{
                border-style: none;
                
            }
            .btn2 a{
                color:white;
            }
            .btn2 a:hover{
                text-decoration: none;
                color: darkcyan;              
            }
            .btn2:hover{
                color: darkcyan;
            }
            .sidebar a{
                text-decoration: none;
                color:black;
            }
            .sidebar a:hover{
                text-decoration: none;
                color:lightsalmon;
            }
          

        </style>
    </head>
    <body style="margin-top: 45px;">
        <style>
             @media only screen and (max-width: 720px){

             
            .col-1-3 {
                display:none;
            }
            .col-2-3{
              width:100%;
              display: block;
              margin-left: auto;
              margin-right: auto;
            }
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
                    <tr><td><img src="watch.png"/> Watch</td></tr>
                    
                    <?php
                        $brand=$_REQUEST['brand']??'';
                        $o=$_REQUEST['o']??'';                
                    ?>
                    <th> <br><br>Brand</th>
                    <tr><td><a href="productPage.php"><input type="checkbox" value="A" onclick="window.location.href='productPage.php'" > All</a></td></tr>
                    <tr><td><a href="productPage.php?brand=gshock"><input type="checkbox" value="GS" onclick="window.location.href='productPage.php?brand=gshock'"> G-shock</a></td></tr>
                    <tr><td><a href="productPage.php?brand=orient"><input type="checkbox" value="O" onclick="window.location.href='productPage.php?brand=orient'"> Orient</a></td></tr>
                    <tr><td><a href="productPage.php?brand=roscani"><input type="checkbox" value="R" onclick="window.location.href='productPage.php?brand=roscani'"> Roscani</a></td></tr>
                    
                    <th> <br><br> Price</th>
                    <tr><td><a href="productPage.php?o=asc"><input type="checkbox" value="A"  onclick="window.location.href='productPage.php?o=asc'"> Low to High</a></td></tr>
                    <tr><td><a href="productPage.php?o=desc"><input type="checkbox" value="D" onclick="window.location.href='productPage.php?o=desc'"> High to Low</a></td></tr>
                   
                </table>
            </div>
            
            <div class="col-2-3">
                <h1 style="margin-top: 45px;"><b>Men's Watch</b></h1>
                <!--Slideshow-->
                <div class="slideshow-container" style="margin-top: 30px;">
                    <div class="mySlides2 fade">
                        <img src="men1.jpg" style="width:100%" alt="watch">
                    </div>

                     <div class="mySlides2 fade">
                         <img src="men2.jpg" style="width:100%" alt="watch">
                    </div>

                     <div class="mySlides2 fade">
                         <img src="men3.jpg" style="width:100%" alt="watch">
                    </div>
                </div>
               <div style="text-align:center" class="dott">
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                </div>
                <div class="row" >
                <!--Buttons of grid and list-->
                <div class="buttons">
                    <i class="fa fa-th-large"  id="showdiv1" aria-hidden="true" onclick=""></i> &nbsp;  <i class="fa fa-th-list" id="showdiv2" aria-hidden="true"></i> 
                    
                      <!--Page show-->
                    <div class="pagination" style="margin-left: 900px;font-size: 15px;">
                      <a href="#">&laquo;</a>
                      <a class="active" href="#productPage.php">1</a>
                      <a href="#">2</a>
                      <a href="#">&raquo;</a>
                    </div>
                </div>
                
                </div>
                
               <?php
               //product database
                 require_once("product.php");
                 $db_handle = new Product();
                             
               ?>
                    <!--Product Grid-->
            <div id="div1">
                <section class="section-grid">
                <div class="grid-prod">
                 
                   <?php
                    $product_array = $db_handle->runQuery("SELECT * FROM product WHERE gender='M' AND brand LIKE '%$brand%' order by price $o");
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                    ?> 

                    <div class="prod-grid"><a href="../ProductDetails/productDetail.php?&code=<?php echo $product_array[$key]["code"];?>" ><img src="<?php echo $product_array[$key]["pic_name1"]; ?>"></a>                           
                            <h3><?php echo $product_array[$key]["prod_name"]; ?></h3>
                            <p><?php echo "RM".$product_array[$key]["price"].".00"; ?></p>
                            <button class="btn2" ><a href="../ProductDetails/productDetail.php?&code=<?php echo $product_array[$key]["code"];?>"> Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></button> 
                    </div>                   
                   
                    <?php
                        }
                    }
                    ?>  
                 
                </div>                                                                 
              </section> 
            </div>     
                   <!--Page show-->
                    <div class="pagination" style="margin-left: 900px;font-size: 15px;">
                      <a href="#">&laquo;</a>
                      <a class="active" href="#productPage.php">1</a>
                      <a href="#">2</a>
                      <a href="#">&raquo;</a>
                    </div>
              </div>                                                                       
            </div>
        </div>
       <script>
           var slideIndex = 0;
           showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides2");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
        </script>
        <script>
           $(function() {
            $('#showdiv1').click(function() {
                $('div[id^=div]').hide();
                $('#div1').show();
            });
            $('#showdiv2').click(function() {
                $('div[id^=div]').hide();
                $('#div2').show();
            });
        })
        </script>
        <script>
          var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = "RM0-" + slider.value; // Display the default slider value

            // Update the current slider value (each time you drag the slider handle)
            slider.oninput = function() {
              output.innerHTML = "RM0-" + this.value;
            }
        </script>
 <?php
include('../Sharing/footer.php');
?>       
    </body>
</html>
