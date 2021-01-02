<!doctype html>
<header>
<link href="../Sharing/base.css" rel="stylesheet"> 
<link href="../Sharing/bootstrap.css" rel="stylesheet">
 <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">
   
  <div class="header-1"> 
            <div class="logo">
                <a href="../Home/Home.php"><img src="../Sharing/image/logo.png" alt="logo"/> </a>  
            </div>
         
            <div class="header-inner">
                 <div class="col-1-5">
               <div class="iconImg" >
                   <a href="../Account/account.php"><img src="../Sharing/image/account.png" alt="account"/></a><br>
                </div>
                 <p><?php   
                  
               
              if(isset($_SESSION['name'])){
                    $name=$_SESSION['name']; 
                    $Logname= $name;
              }

            else{
                          $Logname="Account"; 
                         
             }
               if(isset($_SESSION['Logemail'])){
                    $email=$_SESSION['Logemail']; 
                   
               }
                    echo $Logname;
                    ?>-<a href="../Sharing/Logout.php">Logout</a></p>
                </div>
            <div class="col-1-5">
               <div class="iconImg" style="margin:5px 15px 0px 10px;">
                   <a href="../Checkout/checkout.php"><img src="../Sharing/image/checkoutIcon.png" alt="checkoutIcon"/></a><br>
                </div>
                <a href="../Checkout/checkout.php"><p>Checkout</p></a>
                </div>
             <div class="col-1-5">
                 <div class="iconImg">
                     <a href="../Sharing/customerhelp.php"><img src="../Sharing/image/CustomerHelpIcon.png" alt="CustomerHelpIcon"/></a><br>
                 </div>
                 <a href="../Sharing/customerhelp.php"><p>Customer Help</p></a>
                
            </div>
            <div class="col-1-5">
                <div class="iconImg">
                 <a href="../Sharing/Login.php"> <img src="../Sharing/image/MyAccountIcon.png" alt="MyAccountIcon"/><br>
                </div>
                <a href="../Sharing/Login.php"><p>Log in/Sign up</p></a>
            </div>
            </div>
      
        </div>




        
       
        
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="position:relative;">
      
    <a class="navbar-brand" href="../Home/Home.php"><img src="../Sharing/image/smallLogo.png" alt="smallLogo"/></a>
     
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../Home/Home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="../ContactUs/contactUs.php">Contact Us</a>
        </li>
          <li class="nav-item active">
              <a class="nav-link" href="../ProductCatalog/productPage.php">Mens</a>
        </li>
        <li class="nav-item active">
              <a class="nav-link" href="../ProductCatalog/productPageW.php">Women</a>
        </li>
       
      
        
        <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff only</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="../Server/serverLogin.php">staff login</a>
            <a class="dropdown-item" href="../Server/serverSignUp.php">staff sign up</a>
         
        </div>
      </li>
      <a class="navbar-brand" href="../Cart/cart.php"><img src="../Sharing/image/cart.png" alt="cart" style="width:30px;margin-left:5px;"/></a></li>
      </ul>
        
      <form class="form-inline mt-2 mt-md-0" method="post" action="../searchPage/searchPage.php">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0"  name="submit" type="submit">Search</button>
      </form>
    </div>
  </nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>

</header>