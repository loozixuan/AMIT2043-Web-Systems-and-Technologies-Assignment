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
            .btn2 a{
                color:white;
            }
            .btn2 a:hover{
                text-decoration: none;
                color: darkcyan;
                display: inline-block;
            }
            .btn2:hover{
                color: darkcyan;
            }
        </style>
    </head>
    <body style="margin-top: 45px;">
   
  <?php
  include('../Sharing/header.php');
  ?>
        <div class="row">
            <div class="col-1-3">
                <table class="sidebar" style="margin-left: 70px;margin-top: 45px;position: sticky;top:0">
                    <input type="hidden" name="filter">
                    <th>Product Catagory</th>
                    <tr><td><input type="checkbox" value="watch"> Watch</td></tr>
                    
                    <th><br><br>Gender</th>
                    <tr><td><input type="checkbox" value="M"> Male</td></tr>
                    <tr><td><input type="checkbox" value="F"> Female</td></tr>
                   
                    <th> <br><br>Brand</th>
                    <tr><td><input type="checkbox" value="GS"> G-shock</td></tr>
                    <tr><td><input type="checkbox" value="O"> Orient</td></tr>
                    <tr><td><input type="checkbox" value="R"> Roscani</td></tr>
                    
                    <th><br><br>Filter by Price</th>
                    <tr><td><input name="rangeBox" id="myRange" type="range" min="0" max="1000"></td></tr>
                    <tr><td>Price: <span id="demo"></span></td></tr>
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
                    <span class="sorting" style="margin-left: 20px;font-size: 15px;padding:20px;">
                    <select id="sort">
                     <option value="price">Sort by: Price(low to high)</option>
                     <option value="price">Sort by: Price(high to low)</option>
                     <option value="popularity">Sort by: Popularity</option> 
                 </select>
                </span>  
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
                    $product_array = $db_handle->runQuery("SELECT * FROM product WHERE code LIKE 'P100_' ORDER BY code ");
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                    ?> 

                      <div class="prod-grid"><a href="../ProductDetails/productDetail.php?&code=<?php echo $product_array[$key]["code"];?>" ><img src="<?php echo $product_array[$key]["pic_name1"]; ?>"></a>                             
                            <h3><?php echo $product_array[$key]["prod_name"]; ?></h3>
                            <p><?php echo "RM".$product_array[$key]["price"].".00"; ?></p>
                            <button class="btn2"><a href="../ProductDetails/productDetail.php?&code=<?php echo $product_array[$key]["code"];?>" >Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></button> 
                       </div>                   
                    
                    <?php
                        }
                    }
                    ?>  
                 
                </div>                                                                 
              </section> 
            </div>     
                  <span class="sorting" style="margin-left: 20px;font-size: 15px;padding:20px;">
                    <select name="sort">
                     <option value="price">Sort by: Price(low to high)</option>
                     <option value="price">Sort by: Price(high to low)</option>
                     <option value="popularity">Sort by: Popularity</option> 
                 </select>
                </span>  
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
