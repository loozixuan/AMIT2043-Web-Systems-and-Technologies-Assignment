<!doctype html>
<html lang="en">
  <head>
    <?php
       session_start();
      ?>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lee Sin Meai">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

    <!-- Bootstrap core CSS -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 640px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
  <?php
    
       
  
  include('../Sharing/header.php');
  ?>

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
     
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
         <img src="../Home/casio.jpg" alt="casio"/>
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" style=><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-left">
                 
            <p><a class="btn btn-lg btn-primary" href="../ProductDetails/productDetail.php?code=P1008" role="button" style=" background-color: rgba(0,0,0,0.6);">View more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
            <img src="../Home/roscani.jpg" alt="roscani"/>
      
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption">
             <p><a class="btn btn-lg btn-primary" href="../ProductDetails/productDetail.php?code=P10013" role="button" style=" background-color: rgba(0,0,0,0.6);">View more</a></p>
          </div>
        </div>
      </div>
    
      <div class="carousel-item">
          <img src="../Home/orient.jpg" alt="orient"/>
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-right">
           <p><a class="btn btn-lg btn-primary" href="../ProductDetails/productDetail.php?code=P1009" role="button" style=" background-color: rgba(0,0,0,0.6);">View more</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
   


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->
  <style>

       



div.col-lg-4Img img{
  
    width:100%;
  
}
.col-lg-4Img img:hover{
 transition: transform .65s ease ;
 transform:scale(1.07);
 cursor:pointer;
}

div.col-md-5{
    width:500px;
    box-sizing: border-box;
   
  
}

div.col-md-5 img{
    width:96%;
  
  
}

.homeVideo{
    box-sizing: border-box;
   margin-right:-80px;
   margin-left:-80px;
   background-size: cover;
    overflow: hidden;
    height:500px;
    
}
video{
    box-sizing: border-box;
    width:100%;
    
    
   
}
.col-md-5:hover{
     transition: transform .65s ease ;
 transform:scale(1.07);
 cursor:pointer;
}

 @media only screen and (max-width: 640px){

     .homeVideo{
   
   margin-right:-10px;
   margin-left:-20px;
   margin-bottom: -100px;
  
    
}       
 }
  </style>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">  
          <div class="col-lg-4Img"  style="width:158px;margin-top:22px;margin-left: auto;margin-right: auto;">
              <a href="../ProductDetails/productDetail.php?code=P1007"><img src="g-shock1.png" alt="g-shock1"/></a>
          </div>
      
        <h2>G-SHOCK<br>GMW-B5000CS-1</h2>
        <p>This laser-engraved model is a new variation on the full-metal square-face GMW-B5000 that inherits plenty of the DNA of the original G-SHOCK DW-5000C.</p><br>
        <p><a class="btn btn-secondary" href="../ProductDetails/productDetail.php?code=P1007" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
           <div class="col-lg-4Img" style="width:320px;margin-left: auto;margin-right: auto;">
               <a href="../ProductDetails/productDetail.php?code=P10010"><img src="orient1.jpg" alt="orient1"/></a>
          </div>
        <h2>ORIENT<br>RA-AC0011S</h2>
        <p>This new ORIENT 36.4mm Classic mechanical watch with bar index for her (ladies) delivers an outstanding combination of classic allure and exceptional watch making, offering several notable features.</p>
        <p><a class="btn btn-secondary" href="../ProductDetails/productDetail.php?code=P10010" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
           <div class="col-lg-4Img"  style="width:200px;margin-left: auto;margin-right: auto;margin-top: 13px;">
               <a href="../ProductDetails/productDetail.php?code=P10015"><img src="roscani1.jpg" alt="roscani1"/></a>
          </div>
          <h2>ROSCANI<br>Logan</h2>
        <p>The new releases Roscani Men Watch(Logan).We only used finest quality material in all our watches. Roscani goes through vigorous quality tests to make sure you get the best. </p>
        <p><a class="btn btn-secondary" href="../ProductDetails/productDetail.php?code=P10015" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->
         

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
 
        <h2 class="featurette-heading">ORIENT STAR <span class="text-muted">Collection</span></h2>
        <p class="lead">As our most distinguished and exquisite timepiece collection, ORIENT STAR has always provided exceptional quality, craftsmanship and elegant simplicity since 1951.</p>
      </div>
      <div class="col-md-5">
          <a href="../ProductDetails/productDetail.php?code=P10016" ><img src="../Home/orient-promo.jpg" alt="orient-promo"/></a>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Pink Gold X   <span class="text-muted">Transparent</span></h2>
        <p class="lead">Introducing new compact G-SHOCK model that is great choices for women who prefer mannish G-SHOCK styling. Transparent style was introduced and became very popular back in the ’90s, making it an essential part of G-SHOCK history.
The face of the model has a pink-gold metallic finish, and its solid designs make it perfect wrist-worn accents for everything from mode fashions, to street and casual fashions.
Base model for this lineup is the popular GA-110.</p>
      </div>
      <div class="col-md-5 order-md-1">
          <a href="../ProductDetails/productDetail.php?code=P1001" ><img src="../Home/baby-G-promo.jpg" alt="baby-G-promo"/></a>
      </div>
    </div>

    <script>
        window.onload = function () {
         var element = document.getElementById('video');
         element.muted = "muted";
        }
    </script>
    <br>
    <br>
    <br>
    <div class="homeVideo" >
         <video id="video" autoplay="autoplay" loop="loop" controls="controls" >
             <source src="CASIO G-SHOCK.mp4" type="video/mp4"/>
         </video>  
        
    </div>
    
    <br>
    <br>
    <br>

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">ROSCANI <span class="text-muted">Women Watches</span></h2>
        <p class="lead">Conquer your day accompanied by our women series of watches.; whether it's a casual day out or at business, Roscani's women's watches are sure to bring that wonder woman out in you.</p>
      </div>
      <div class="col-md-5">
          <a href="../ProductDetails/productDetail.php?code=P10014" ><img src="../Home/roscani-promo.jpg" alt="roscanu-promo"/></a>
      </div>
    </div>
    

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
  

<?php
include('../Sharing/footer.php');
?>
</main>
</body>
</html>
