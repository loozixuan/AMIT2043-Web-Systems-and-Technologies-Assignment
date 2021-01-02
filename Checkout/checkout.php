<?php  session_start();?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
<!DOCTYPE html>

<html>
    <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lee Sin Meai">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>
    <link href="../Checkout/checkout.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="margin-top: 45px;">
       
        <?php
   
  include('../Sharing/header.php');
       
  $viewOrder=$checkOutMessage=$nameErr=$phoneErr=$emailErr=$addressErr=$postcodeErr=$cardErr="";
  $total_price=$success=0;
  if($_SERVER['REQUEST_METHOD']=='POST'){
      
    if(empty($_POST['nameBox'])){
        $nameErr="Please enter your name.";
    }
    else{
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['nameBox'])) {
            $nameErr = "Only letters and white space allowed";
        }else{
           $name=$_POST['nameBox'];
        }
    }
    if(empty($_POST['phone'])){
        $phoneErr="Please enter your phone number.";
    }
    else{
        if(!preg_match("/^(01)[0-46-9]*[0-9]{7,8}$$/",$_POST['phone'])){
            $phoneErr="Please enter a valid Telephone Number.";
        }else{
            $phone=$_POST['phone'];
        }
    }
    if(empty($_POST['emailBox'])){
        $emailErr="Please enter your email address.";
    }
    else{
        if(!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/",$_POST['emailBox'])){
            $emailErr = "Please enter a valid email.";
        }else{
            $email=$_POST['emailBox'];
            $_SESSION['email']=$email;
        }
          
    }
    if(empty($_POST['addressBox'])){
        $addressErr="Please enter your address.";
    }
    else{
        $address=$_POST['addressBox'];
    }
    if(empty($_POST['postcodeBox'])){
        $postcodeErr="Please enter your postcode.";
    }
    else{
        $postcode=$_POST['postcodeBox'];
    }
    if($_POST['cardNo']){
        if(!preg_match("/^4[0-9]{12}(?:[0-9]{3})?$/", $_POST['cardNo'])&&!preg_match("/^5[1-5][0-9]{14}$/", $_POST['cardNo'])){
            $cardErr="Invalid card number/ MM/YY / CVC.";
        }else{
            $cardNo=$_POST['cardNo'];
        }
    }
    if($_POST['card_date']){
        if(!preg_match("/^(0[1-9]|1[0-2])\/([0-9]{2})$/", $_POST['card_date'])){
            $cardErr="Invalid card number/ MM/YY / CVC.";
        }else{
            $card_date=$_POST['card_date'];
        }
    }
    if($_POST['cvc']){
        if(!preg_match("/^[0-9]{3,4}$/", $_POST['cvc'])){
            $cardErr="Invalid card number/ MM/YY / CVC.";
        }else{
            $cvc=$_POST['cvc'];
        }
    }

 
      
    if($checkOutMessage==""&&$nameErr==""&&$phoneErr==""&&$emailErr==""&&$addressErr==""&&$postcodeErr==""&&$cardErr==""){
        $_SESSION["order"]=$_SESSION["product"];
        $_SESSION["orderStatus"]=$_SESSION["product"];
        unset($_SESSION["product"]);
         //count orderNo
        $conn=new mysqli("localhost","root","","wst");
        if($conn === false){
            die("ERROR: Could not connect. " . $conn->connect_error);
        }
        $row=mysqli_query($conn,"select orderNo from orders");
        $num=mysqli_num_rows($row);
        $i=1;
        if($num==0){
            $i=1;
        }else{  
            $i+=$num;
        } 
        $b=0;
        $orderNo="K".rand(100000,999999).$i;
        $custID="C00".$i;
        $orderStatus="Paid";
        $orderDate=date("Y-m-d");
        //insert order
        $sql = "INSERT INTO customer (custID,email,name,address,phoneNo)VALUES ('$custID','$email', '$name','$address','$phone')";
        $_SESSION['custID']=$custID;
        $_SESSION['orderNo']=$orderNo;
        foreach ($_SESSION["order"] as $item){
           $total_price += ($item["price"]*$item["quantity"]);  
        }
        $sql2= "INSERT INTO orders (orderNo,custID,orderDate,orderStatus,totalAmount)VALUES ('$orderNo','$custID', '$orderDate','$orderStatus',$total_price)";
        if($conn->query($sql) === true){
            $b=1;
        }
        if($conn->query($sql2) === true){
            $b=1;
        }
        foreach ($_SESSION["order"] as $item){
            $item_price = $item["quantity"]*$item["price"];
            $code=$item["code"];
            $qty=$item["quantity"]; 
            $link= "INSERT INTO orderdetails (orderNo,code,qty,subtotal)VALUES ('$orderNo', '$code',$qty,$item_price)";
            //update quantity
            $update="UPDATE product SET quantity=quantity-$qty WHERE code='$code'";
            
            if (mysqli_query($conn, $link)&&mysqli_query($conn, $update)) {
                 $success=1;
            } else {
                     echo "Error: " . $link.$update. "<br>" . mysqli_error($conn);
            }
        }
        if($b==1&&$success==1){ //object-oriented
        $checkOutMessage="Your order number is ".$orderNo;
        echo '<div class="message">';
        echo " <p style='text-align: center;'>$checkOutMessage<a href='../orderPage/viewOrderList.php?orderNo=$orderNo'>View Order</a></p>";
        echo "</div>";
        
        ?>
        
        
       
        
        
 <?php       
//email      
$to = $email;
$subject = 'Your Order Summary - KWANG TAT';
$message = "
<html>
<head>
<title>KWANG TAT</title>
</head>
<body style='margin:30px;'>
<p style='font-size:2.2em;color:rgb(51, 204, 204);'>Thank you for shopping online with us</p>
<p style='font-size:1.5em;'>Dear $name:</p>
<p style='font-size:1.3em;'>We have received your order(Order No:$orderNo)and will send you email updates about the status of your order</p>
<p style='font-size:1.3em;'>You can click the button below to check the status of your order.</p>
<a href='localhost/WST/orderPage/viewOrderList.php?orderNo=$orderNo><input style='border: 2px solid black;background-color:white;padding:10px;margin-top:20px;margin-bottom:20px;margin-left:20px;display:block;font-size:1.3em;text-decoration:none;' type='button' name='Log in' value='View Order Status'/></a>
</body>
</html>
";

//// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <leesm-wm19@student.tarc.edu.my>' . "\r\n";

mail($to, $subject, $message, $headers);

        unset($_SESSION["order"]);
        } else{
            echo "Error: " . $sql.$sql2. "<br>" . mysqli_error($conn);
        }
         
        mysqli_close($conn);
    }
     
  }
  ?>
<?php  if(!empty($_SESSION["product"])){?>
<div class="checkout">
    
    <h1>Checkout</h1><br>
    <h3 class="banner" >Billing Details</h3>
               <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="col-1-2">
                    <div class="formRow">
                     <label for="nameBox">Name : <span class="text-danger">*</span></label>
                     <input name="nameBox" id="name" type="text" placeholder ="First and Last Name" value="<?php if(isset($_POST['nameBox'])) echo $_POST['nameBox'];?>" />
                     <?php echo "<p style='color:red;'>$nameErr</p>";?>
                    </div> 
                    <div class="formRow">
                     <label for="phone">Cell Phone : <span class="text-danger">*</span></label>
                     <input name="phone" type="text" id="cellphone" placeholder="nnnnnnnnnn" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" />
                     <?php echo "<p style='color:red;'>$phoneErr</p>";?>
                    </div>
                    <div class="formRow">
                     <label for="emailBox">E-mail Address : <span class="text-danger">*</span></label>
                     <input name="emailBox" id="emailAddress" type="text" value="<?php if(isset($_SESSION['Logemail'])){ echo  $_SESSION['Logemail'];}else if(isset($_POST['Logemail'])) echo  $_POST['Logemail'];?>">
                     <?php echo "<p style='color:red;'>$emailErr</p>";?>
                    </div>
                    <div class="formRow">
                       <label for="addressBox">Address : <span class="text-danger">*</span></label>
                       <textarea name="addressBox" id="address" placeholder="Street Address" value="<?php if(isset($_POST['addressBox'])) echo $_POST['addressBox'];?>"></textarea>
                       <?php echo "<p style='color:red;'>$addressErr</p>";?>
                    </div>
                    <div class="formRow">
                        <label for="cityBox">City : <span class="text-danger">*</span></label>
                        <select name="cityBox" id="city">
                           <option value="kualaLumpur" selected>Kuala Lumpur</option>
                           <option value="petalingJaya" >Petaling Jaya</option>
                           <option value="johorBahru" >Johor Bahru</option>
                           <option value="seremban" >Seremban</option>
                           <option value="ipoh">Ipoh</option>
                           <option value="georgeTown">George Town</option>
                           <option value="kuching">Kuching</option>
                           <option value="kotaKinabalu">Kota Kinabalu</option>
                           <option value="shahAlam">Shah Alam</option>
                           <option value="melaka">Melaka</option>
                           <option value="alorSetar">Alor Setar</option>
                           <option value="miri">Miri</option>
                           <option value="kualaTerengganu">Kuala Terengganu</option>
                       </select>
                    </div>
                    <div class="formRow">
                        <label for="stateBox">State : <span class="text-danger">*</span></label>
                        <select name="stateBox" id="state">
                           <option value="selangor" selected>Selangor</option>
                           <option value="johor">Johor</option>
                           <option value="seremban">Seremban</option>
                           <option value="penang">Penang</option>
                           <option value="malacca">Malacca</option>
                           <option value="perlis">Perlis</option>
                           <option value="pahang">Pahang</option>
                           <option value="kelantan">Kelantan</option>
                           <option value="Kedah">Kedah</option>
                           <option value="terengganu">Terengganu</option>
                           <option value="Sarawak">Sarawak</option>
                           <option value="sabah">Sabah</option>
                        </select>
                    </div>
                    <div class="formRow">
                       <label for="postcodeBox">Postcode : <span class="text-danger">*</span></label>
                       <input name="postcodeBox" id="postcode" type="text" placeholder="53000"   pattern="^\d{5}$" value="<?php if(isset($_POST['postcodeBox'])) echo $_POST['postcodeBox'];?>">
                       <?php echo "<p style='color:red;'>$postcodeErr</p>";?>
                    </div>
                </div>
              
        
   
                <div class="col-1-2">
                    <table class="order">   
                        <tr class="title">
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php 
                              foreach ($_SESSION["product"] as $item){
                                  $item_price = $item["quantity"]*$item["price"];   
                         ?> 
                        <tr class="items">
                            <td style="box-sizing:border-box;width:110px;height:50px;font-size:0.6em;padding:10px;"><img src="<?php echo $item["pic_name1"]; ?>" style="width:70%;height:50px;"/><br><?php echo $item["prod_name"]; ?></td>
                            <td style="padding:10px;"><?php echo $item["quantity"]; ?></td>
                            <td style="padding:10px;"><?php echo "RM ".$item["price"]; ?></td>
                            <td style="padding:10px;"><?php echo "RM ". number_format($item_price,2); ?></td>
                        </tr>
                        <?php  $total_price += ($item["price"]*$item["quantity"]);}?>
                    </table>
                   
                    <table class="order">
                        <tr class="bill">
                            <td>Free Shipping</td>
                            <td>RM0.00</td>
                        </tr>
                        <tr class="bill">
                            <td><b>Total</b></td>
                            <td><b><?php  echo "RM ".number_format($total_price, 2); ?></b></td>
                        </tr>
                    </table>
<style>
table.payment{
    border: 1px outset rgba(0, 0, 75, 0.1);
    width:550px;
    margin-bottom: 10px;
}
table.payment td{
    padding:10px 20px 10px 20px;
}
input[type="radio"]{
    margin-right: 10px;
}
td.card_input input{
    border:white;
    padding:10px;
}

</style>
                    <table class="payment">
                        <tr><td><input type="radio" checked>Credit/Debit Card <i class="fa fa-cc-visa" style="font-size:1.3em;color:red;margin-right: 10px;margin-left: 10px"></i><i class="fa fa-cc-mastercard" style="font-size:1.3em;color:blue"></i></td></tr>
                        <tr><td>Pay securely with your credit or debit card. Enter or scan your card details below:</td></tr>
                        <tr><td class="card_input"><input type="text" name="cardNo" placeholder="Card Number"  value="<?php if(isset($_POST['cardNo'])) echo $_POST['cardNo'];?>"><input type='text' name='card_date' placeholder="MM/YY" value="<?php if(isset($_POST['card_date'])) echo $_POST['card_date'];?>"><input type='text' name='cvc' placeholder="CVC" value="<?php if(isset($_POST['cvc'])) echo $_POST['cvc'];?>"></td></tr>
                        <tr><td> <?php echo "<p style='color:red;'>$cardErr</p>";?></td></tr>
                    </table>
                    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                    <div class="checkout-button" style=" margin-top:20px;"><input type="submit" name="checkout" value="Place Order" ></div>
                </div>   
             </form>
    
 
      
                 
   
                <?php }else{ ?>
                    <style>
                        .empty_cart{
                            margin:80px 450px 80px 450px;
                            
                            padding:10px;
                        }
                        .empty_img{
                            box-sizing: border-box;
                            width:250px;
                            margin-left: auto;
                            margin-right: auto;
                        }
                        .empty_img img{
                            width:100%;
                        }
                       
                        
                        .shop{
                            border: 2px solid red;
                            font-size:1.3em;
                            background-color: white;
                            padding:15px;
                            
                           
                        }
                        .shop:hover{
                            border: 2px solid white;
                            font-size:1.3em;
                            background-color: black; 
                            color:white;
                          
                        }

                    </style>
                    <div class="empty_cart" >
                       <div class="empty_img"><img src="empty_cart.jpg"/></div>
                       <div class="empty_txt">
                           <p style="text-align:center;"><b>Oops,Your Cart is currently Empty</b></p>
                           <p style="text-align:center;">Browse our awesome deals now!</p>
                           <a href="../ProductCatalog/productPageW.php"><button style="display:block;margin-left: auto;margin-right: auto;" class="shop">Go Shopping Now</button></a>
                       </div>
                    </div>
                <?php }?>
                    
               
               
        
</div>
<?php include('../Sharing/footer.php');?>
</body>
</html>


 