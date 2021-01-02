<!DOCTYPE html>

<html>
    <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lee Sin Meai">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
   
    <body>
        <div>
            <?php
                require ("searchBar.php");
            ?>
       </div>
        

        <div class="mainBody">
            <div class="header" style="height: auto;">
                <?php
                require ("index.php");
                ?>
        </div>
        <div class="main">
            <p style="background-color:#F0F0F0;width:93%;padding:16px;margin-left: 38px;font-size: 17px;border-radius: 5px;color:grey;"><a href="homeServer.php" style='background-color:#F0F0F0;color:#0066ff;'>Home</a> / <a href="customerOrder.php" style="background-color:#F0F0F0;color:green">Order</a> / Order Detail</p>
               
    
                 <style>
             
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
                        .orderDetail{
                            margin:0px 20px 30px 30px;
                            padding:10px;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        }
                        .custInfo{
                            margin-left: 20px;
                            margin-left: 20px;
                        }
                        .banner{
                            border-radius: 5px;
                            box-sizing: border-box;
                            padding:10px;
                            font-size:1.3em;
                            margin: 10px 20px 20px 0px;
                            background-image: radial-gradient(circle, #283ed1, #3b4ddb, #4b5ce5, #5a6bef, #687af8);
                        }
                        td{
                            font-size:1.1em;
                            padding:5px;
                        }
                        td>input{
                             width: 300px;
                             padding: 10px;
                             border-radius: 5px;
                             border: 1px solid #ccc;
                             margin-left:20px
                        }
                        .img{
                            width:150px;
                            box-sizing: border-box;
                        }
                        .img img{
                            width:100%;
                        }
                        table.product{
                           margin: 15px;
                           width:800px;
                           border: 1px outset rgba(0, 0, 75, 0.1);
                           border-collapse: collapse;
                        }
                        tr.product_detail>th{
                             height: 30px;
                             font-size: 1.1em;
                             background-color: #F7F7F7;
                        }
                        tr.product_detail2>td{
                             text-align: center;
                             font-size: 1.1em;
                             
                        }
                        
                        @font-face{
                          font-family: p;
                          src: url(Roboto-Regular.ttf);
                        }
                        .delete{
                            margin:40px;
                           
                        }
                        .delete>input{
                            font-size:1.1em;
                            padding:10px;
                            background-color:red;
                            color:white;
                            border-radius:5px;
                            border: 1px solid #ccc;
                        }
                        .delete>input:hover{
                            background-color:#cc0000;
                        }
                            
                </style>  
               <?php 
                if($_REQUEST['action']=="cancel"){  
                        $action="cancel";
                    }else{
                         $action="delivered";
                    }
              
                   $orderNo=$_REQUEST['orderNo'];
                   $conn=new mysqli("localhost","root","","wst");
                    if($conn === false){
                     die("ERROR: Could not connect. " . $conn->connect_error);
                    }
                    if($orderNo){
                        //customer
                        $q="SELECT * FROM customer WHERE custID='" . $_REQUEST["custID"] . "'";
                        $row=mysqli_query($conn,$q);
                        $num=mysqli_num_rows($row);
                        //orders
                        $q="SELECT * FROM orders WHERE orderNo='" . $_REQUEST["orderNo"] . "'";
                        $p=mysqli_query($conn,$q);
                        $num=mysqli_num_rows($p);
                       
                       if($num>0){
                           //customer
                          $row=mysqli_fetch_array($row);
                          $custID=$row['custID'];
                          $email=$row['email'];
                          $name=$row['name'];
                          $address=$row['address'];
                          $phone=$row['phoneNo'];
                          //order
                          $order=mysqli_fetch_array($p);
                          $orderNo=$order['orderNo'];
                          $orderDate=$order['orderDate'];
                          $status=$order['orderStatus'];
                          $total=$order['totalAmount'];
   
                        }
                    }
                    
                    //delete
                    if(isset($_POST['cancel'])){ 
                        $sql= "UPDATE orders SET orderStatus='Cancel' WHERE orderNo='$orderNo'";
                        if($conn->query($sql) === true){
                                      
                        }else {
                            echo "Error: " . $sql. "<br>" . mysqli_error($conn);
                        }
                    }else if(isset($_POST['delivered'])){ 
                        $sql= "UPDATE orders SET orderStatus='Shipping' WHERE orderNo='$orderNo'";
                        if($conn->query($sql) === true){
                            //email      
$to = $email;
$subject = 'Updated Order Status - KWANG TAT';
$message = "
<html>
<head>
<title>KWANG TAT</title>
</head>
<body style='margin:30px;'>
<p style='font-size:2.2em;color:rgb(51, 204, 204);'>Thank you for shopping online with us</p>
<p style='font-size:1.5em;'>Dear $name:</p>
<p style='font-size:1.3em;'>Your order is on shipping.(Order No:$orderNo)</p>
<p style='font-size:1.3em;'>You can click the button below to check the status of your order. Please click the (Received) button on the View Order page after you received the order.</p>
<a href='localhost/WST/orderPage/viewOrderList.php?orderNo=$orderNo'><input style='border: 2px solid black;background-color:white;padding:10px;margin-top:20px;margin-bottom:20px;margin-left:20px;display:block;font-size:1.3em;text-decoration:none;' type='button' name='Log in' value='View Order Status'/></a>
</body>
</html>
";

//// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <leesm-wm19@student.tarc.edu.my>' . "\r\n";

mail($to, $subject, $message, $headers);
                                      
                        }else {
                            echo "Error: " . $sql. "<br>" . mysqli_error($conn);
                        }
                    }
                                   
                   
                    
                   
               ?>
                <form action="orderDetail.php?action=<?php echo $action;?>&orderNo=<?php echo $orderNo;?>&custID=<?php echo $custID;?>" method='post'>
                <div class="orderDetail">
                <div class="custInfo">
                    <h3>Order ID - <?php echo$orderNo;?></h3>
                    <div class="banner">Customer Detail</div>
                    <table>
                        <tr><td>Customer ID   :</td><td><input type="text" value="<?php echo $custID;?>"></td></tr>
                        <tr><td>Customer Name :</td><td><input type="text" value="<?php echo $name;?>"></td></tr>
                        <tr><td>Email :</td><td><input type="text" value="<?php echo $email;?>"></td></tr>
                        <tr><td>Phone Number :</td><td><input type="text" value="<?php echo $phone;?>"></td></tr>
                        <tr><td>Address :</td><td><input type="text" value="<?php echo $address;?>"></td></tr>
                    </table>
                    <div class="banner">Order Detail</div>  
                    <table>
                        <tr><td>Order Date  :</td><td><input type="text" value="<?php echo $orderDate;?>" style="border:none;width:400px;"></td><td>Order Status :</td><td><input type="text" value="<?php echo $status;?>" style="border:none;width:100px;color:red;"></td></tr>      
                        <tr><td></td><td><input type="text" value="" style="border:none;width:400px;"></td><td>Total Payment :</td><td><input type="text" value="<?php echo "RM ".$total;?>" style="border:none;width:100px;"></td></tr>      
                    </table>
                    <table class="product">
                        <tr class="product_detail">
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php 
                        //detail
                         $q="SELECT * FROM orderdetails WHERE orderNo='" . $_REQUEST["orderNo"] . "'";
                          $d=mysqli_query($conn,$q);
                          $num=mysqli_num_rows($d);
                          
                         if($num>0){
                          while($detail=mysqli_fetch_assoc($d)){ 
                           //product
                          $q="SELECT * FROM product WHERE code='" . $detail["code"] . "'";
                          $product=mysqli_query($conn,$q);
                          $num=mysqli_num_rows($product);
                          $pro=mysqli_fetch_assoc($product);?>
                        <tr class="product_detail2">
                            <td><?php echo $detail['code']; ?></td>
                            <td><?php echo $pro['prod_name']; ?></td>
                            <td class="img"><img src="<?php echo $pro['pic_name1'];?>"/></td>
                            <td><?php echo $detail['qty']; ?></td>
                            <td><?php echo $detail['subtotal']; ?></td>
                        </tr>
                         <?php }?>
                        </table>
                         
                         </form>
                          <?php 
                          
                            if($_REQUEST['action']=="cancel"){  ?>
                               <div class="delete"><input type="submit" name="cancel" value="Cancel" onclick="return confirm('Are you sure you want to cancel this order?');"></div>
                          <?php  }
                          if($_REQUEST['action']=='delivered'){ ?>
                              <div class="delete"><input type="submit" name="delivered" value="Shipping" onclick="return confirm('This order is on shipping?');" style='background-image: radial-gradient(circle, #37bd0b, #3dc80d, #42d40f, #48df10, #4eeb12);;'></div>
                       
                       <?php   }
                          
                           }
                         mysqli_close($conn);
                ?>
                          
                          
                    
                     
                </div> 
                </div>
               
        </div>
        </div>
                
            
              
    </div>              
</body>
</html>