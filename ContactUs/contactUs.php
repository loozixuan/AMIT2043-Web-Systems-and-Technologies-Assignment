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
         <link href="contactUs.css" rel="stylesheet">
          <style>
         .mapEffect iframe{
              padding:0px !important;
              width:100%;
              height:450px;
          }
  
              .mapEffect{
                  position: relative;
              }

             .mapEffect::after{
                  content: "";
                  display:block;
                  position: absolute;
                  height:67px;
                  left:0;
                  background-image: url(../Sharing/torn-border.png);
                  bottom: 0;
                  width: 100%;
           
              }
     </style>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
 <body style="margin-top: 45px;">
   
         <?php
          include('../Sharing/header.php');
          
          //create connection
          $dbc = new mysqli("localhost", "root", "", "wst");
        
          // Check connection
           if($dbc === false){
               die("ERROR: Could not connect. " . $dbc->connect_error);
            }      
           mysqli_set_charset($dbc, 'utf8');
           
           $name=$email=$phone=$comment="";
           $msg="";
          
            //count commentID
           
            
          if(isset($_POST['submit'])){              
              $name = $dbc->real_escape_string($_POST['last_name']);
              $email=$dbc->real_escape_string($_POST['email']);
              $phone=$dbc->real_escape_string($_POST['phone']);
              $comment=$dbc->real_escape_string($_POST['comment']);
               $row=mysqli_query($dbc,"select commentID from message");
                $num=mysqli_num_rows($row);
                $i=1;
                if($num==0){
                    $i=1;
                }else{  
                    $i+=$num;
                } 
                $commentID="M000".$i;
                
              $sql="INSERT INTO MESSAGE VALUES('{$commentID}','{$name}','{$email}','{$phone}','{$comment}')";
               if($dbc->query($sql) === true){ 
                   $msg="<br><p style='color:red;font-size:15px;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px'></i> Your message already has been sended, we will reply your message as soon as possible. Thank You!</p>";
               }else{
                   $msg="<p style='color:red;font-size:15px;'><i class='fa fa-times' aria-hidden='true' style='color:red;font-size:20px'></i>Message cannot be sended due to some error.Please try later.</p>";
                   echo $dbc -> connect_error;
                   
               }       
               
                $to = $_POST['email'];
                $subject = 'Customer Feedback';
                $message = $_POST['comment'];
                $headers = "From: loozx-wm19@student.tarc.edu.my";
                mail($to, $subject, $message, $headers);            
          }      
         ?>
     
     <div class="mapEffect" style="padding:0 !important;"> 
        <iframe width="1100" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1089&amp;height=405&amp;hl=en&amp;q=34A%20Jalan%20Besar%20rabtau%20%20Negeri%20Sembilan+()&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> 
         <a href='https://www.symptoma.cn/zh/info/covid-19#info'>冠狀病毒症狀</a> 
        <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=7441ac8b5faccffbeb7fe0cbafa3015504c169ad'></script>
     </div>  
     <h1 style="text-align:center;color:#999999;text-shadow: 2px 2px #666666;">Still Need Help From Us?</h1>
     <div class="container-contact100">
		<div class="wrap-contact100">
                    <form class="contact100-form validate-form" method="post" action="contactUs.php">
				<span class="contact100-form-title">
					Get in Touch With Us
				</span>

				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name" value="<?php if(isset($_POST['first-name'])) echo $_POST['first-name']?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last_name" placeholder="Last name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: zx@gmail.com">
					<input id="email" class="input100" type="email" name="email" placeholder="Eg. example@gmail.com" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100 validate-input" data-validate = "Phone Number is required">
                                    <input id="phone" class="input100" type="phone" name="phone" placeholder="Eg. 010- 1888 1229" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="comment" placeholder="Drop us a message" ><?php if(isset($_POST['comment'])) echo $_POST['comment']?></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn" >
                                    <button class="contact100-form-btn" name='submit' type='submit'>
						Send Message
				    </button>
                                   
				</div>
                                <div class="container-contact100-form-btn" >
                                         <button class="contact100-form-btn" type="reset">
						Reset Message
					</button>
				</div>
                                <div class="popupmsg" style="display:block;margin-left: auto;margin-right: auto;">
                                <?php
                                    echo '<p style="color:red;font-size:15px;">'.$msg."</p>";
                                ?>
                                </div>
                                
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							34A Jalan Besar Rantau 71200, Negeri Sembilan
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							<a href="tel:+6017-611-2856">(+60) 17-611 2865</a><br/>
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Customer Support
						</span>

						<span class="txt3">
							<a href="mailto:KwangTat@gmail.com">KwangTat@gmail.com</a><br/>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
     
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
     
        <?php 
        include('../Sharing/footer.php');
        ?>
    </body>
</html>
