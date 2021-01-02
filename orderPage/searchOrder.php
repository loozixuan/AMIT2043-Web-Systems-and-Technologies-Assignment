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
      <title>Kwong Tat Watches Store</title>
        <link href="../Sharing/base.css" rel="stylesheet">
          <link href="orderStatus.css" rel="stylesheet">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
   <body style="margin-top: 45px;">
       <style>
            @font-face{
           font-family: order;
           src: url(PermanentMarker-Regular.ttf);
        }
             .order{
                background-image: url(banner.jpg);
                  height: 400px;
            }
             #header{
                font-size: 6em;
                padding:0px;
                font-family: order;
                font-style: normal;
                color: white;     
                display: flex;
                justify-content: center;
            }
            .searchBar{
                display: flex;
                justify-content: center;
            }
            .searchBar input{
                width: 35%;
                padding: 13px;
                border-radius: 4px;
            }
            .searchBar button {
              padding: 12px;
              width: 3.5%;
              border-radius: 4px;
              background-color: lightskyblue;
            }
            .searchBar button:hover{
                background-color: #2196F3;
            }
            .items_img{
                width: 160px;
                display: flex;
                justify-content: flex-start;
            }
            tr.items>td{
              padding:20px;
            }
            .product th{
                text-align: center;
                padding: 10px;
                border-bottom: 3px solid grey;
                border-top: 3px solid grey;
                 font-size: 1em;
            }
             .product td{
                text-align: center;
                padding: 16px;
                font-size: 0.9em;
            }
            .button {
              background-color: #4CAF50;
              border: none;
              color: white;
              padding: 9px 14px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 1em;
              margin: 4px 2px;
              cursor: pointer;
            }
            .button:hover {
                background-color: #3e8e41;
              }
            .info p{
              color:black;
            }
            .total{
                text-align: center;
                padding: 10px;
                font-size: 1em;
                
                border-top: 3px solid grey;
                
            }
            .total td{
                text-align: center;
                padding: 12px;
                font-size: 0.9em;
            }
            .col-1-2{
                float:left;
          
            }
             .box {
          background-color: #ddffdd;
          border-left: 6px solid #4CAF50;
          padding: 15px;
          width:80%;
          margin-left: 8.5%;
          font-size: 21px;
        }
        .box a{
            color:black;
        }
        .box a:hover{
            color:red;
            text-decoration: none;
        }
          .column2 h1{
                  margin-top:15%;
                  margin-left: 10%;              
                font-size:1.7em;
            }

        
            /*sidebar*/
            .sidebar table{
                margin-top:40px;
                background-color: #F0FFF0;
                width:75%;
                margin-left: 10%;
            }

            .sidebar td{
                padding:20px;

            }
            .sidebar td a{
                 color:#808080;
            }
            .sidebar td a:hover{
                 color:black;
            }
            .sidebar a:hover{
                text-decoration: none;
            }
               @font-face{
                   font-family: o;
                   src: url(Alata-Regular.ttf);
                }
                    .errorO h1{
                        text-align: center;
                       font-family: o;
                        font-size: 75px;
                        color:red;
                    }
                    .errorO p{
                        text-align: center;
                        font-size: 18px;
                        margin: 0;
                      
                        font-family: var;
                    }
                    .errorO #back{
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                         font-size: 18px;
                         background-color: lightskyblue;
                         color:white;
                         width:22%;
                         padding:8px;
                         margin-top: 2.3%;
                    }
                    .errorO a:hover{
                        text-decoration: none;
                        color:lawngreen;
                    }
                    .sidebar table{
                margin-top:40px;
                background-color: #F0FFF0;
                width:75%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .sidebar td{
                padding:20px;

            }
            .sidebar td>a{
                 color:#808080;
            }
            .sidebar td>a:hover{
                 color:black;
            }


            .sidebar i{
                padding-right: 20px;
            }
        </style>
        
        
        <?php
            include('../Sharing/header.php');

                   $orderStatus="";

        ?>
       <div class="order">  
           <br><br><br><br><br><br><br><br><br>
                <h1 id='header'>Order Details</h1>               
            </div>
        <br><br>
       
        <div class="column2" style="width: 25%;min-height:500px;">
            <div class="sidebar">
                    <h1>My Account</h1>
                    <table>
                        <tr>
                            <td><i class="fa fa-user" aria-hidden="true"></i><a href="../Account/account.php">Account Details</a></td>
                        </tr>
                        <tr>
                            <td style=" color:black;background-color: white;border-left: 3px solid blue; "><a href="orderStatus.php?orderNo=<?php echo $orderNo?>&email=<?php echo $email?>" style="color:black;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Orders</a></td>
                        </tr>
                        <tr>
                            <td><a href="../Sharing/Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></td>
                        </tr>
                       
                    </table>
                </div>
            </div>
        
       
         
            <div class="column">
                <?php
                        $dbc = new mysqli("localhost", "root", "", "wst");
        
                        // Check connection
                        if($dbc === false){
                            die("ERROR: Could not connect. " . $dbc->connect_error);
                        }      
                         mysqli_set_charset($dbc, 'utf8');
                         
                         if(isset($_POST['search'])){
                            $searchOrder=$_POST['search']; 
                         }else if($_REQUEST['orderNumber']){
                            $searchOrder=$_REQUEST['orderNumber']; 
                         }
                         
                         if ($result = $dbc->query("select * FROM orders O, customer C where C.custID=O.custID AND orderNo='$searchOrder'")) {
                           if($dbc -> affected_rows){
                          while($row = $result->fetch_assoc()){
                        ?>
                <div><p class="box box3"><img src="idea.png" style="margin-top:-6px;margin-right: 5px;"> <strong><a href="../Sharing/SignUp.php"> Sign up</a></strong> to make the view order status process more easily</p></div><br>
                <div class="orderDetails">
                    <div class="info">
                    <h2 style="font-family:serif;color: green;text-align: center;font-size: 39px;"><b>Shipment Information</b></h2><br>
                    
                    <div class="col-1-2" style="margin-left:100px;">
                        
                          <p><b>Order Number : </b><?php echo "<br>".$row['orderNo']?></p>
                          <p><b>Order Status : </b><?php echo "<span style='color:green'><br>".$row['orderStatus']."</span>"?></p>
                          <p><b>Order Date : </b><?php echo "<br>".$row['orderDate']?></p>
                         
                   </div> 
                    
                     <div class="col-1-2" style="margin-left:200px;">
                        <p><b>Email Address : </b><?php echo "<br>".$row['email']?></p>
                        <p><b>Telephone Number : </b><?php echo "<br>".$row['phoneNo']?></p>
                        <address>
                            <b>Delivered to:</b><br>
                          <?php
                            echo $row['address'];
                          ?>                       
                        </address>
                        </div>
                  <?php
                
                    }
                    
                    ?>
                      
                </div>
                 <div style="clear:both;margin-left:50px;"><p><b><br><br>Item Purchased: </b></p></div>
                    <section class="section-list" style="clear:both;">
                        <!-- Product purchase -->
                       
                          <table class="product" style="width:100%;">
                             
                              <tr>
                                  <th>Product</th>
                                  <th>Name</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Subtotal</th>
                                  <th></th>
                              </tr>
                         <?php
                  
                        $total_price=0;
                        $sql="select * from orderDetails OD, product P where OD.code=P.code AND orderNo='$searchOrder';";
                        $result= $dbc->query($sql);
                        while($row = $result->fetch_assoc()){
                           if(isset($_REQUEST['orderNumber'])){
                                 $orderStatus="Received";
                                 $sql="update orders set orderStatus='$orderStatus'where orderNo='$searchOrder'";
                                 if($dbc->query($sql)===true){
                                     
                                 }
                              }
                          ?>   
                              <tr class="item">
                                  <td class="items_img" style="margin:0">
                                    <img src="<?php echo $row["pic_name1"]; ?>"/>
                                </td>
                                <td><?php echo $row["prod_name"]; ?></td>
                                <td><?php echo "RM ".$row["price"]; ?></td>
                                <td><?php echo $row["qty"]; ?></td>
                                <td><?php echo "RM ". number_format($row["price"]*$row["qty"],2); ?></td>
                                <td><button class="button" onclick="location.href='../ProductDetails/productDetail.php?code=<?php echo  $row['code']?>'">Reorder</button></td>
                              </tr>
                              
                          <?php  
                        
                          $total_price += ($row["price"]*$row["qty"]);}
           
                          ?>
                          </table>                                               
                    </section>
                    
                    <table class="total" style="margin-left:515px;">
                          <tr >
                            <th> Total Price: </th>      
                            <td  style="font-size:15px;"><?php  echo "<b> RM ".number_format($total_price, 2)."</b>"; ?></td>
                          </tr>
       
                    </table>
                 <form method="post" action="searchOrder.php?orderNumber=<?php echo $searchOrder?>">
                        <button class="button" type="submit" name="submit" style="margin-right: 43%;background-color: lightseagreen;border-radius: 4px;">Item Received</button>
                     </form>  
                </div>  
                 <?php
                           }
                           
                          else{
                          ?>
               
                <div class="errorO"><br>
                    <h1>OPPS !</h1><br>
                    <p style=" font-size: 22px;"><strong>No Order Found</strong></p>
                    <p>It's looks like nothing to found at this location.<br> Please check your order number again.</p>
                    <p><a href="viewOrderList.php" id="back">Back to Previous Page</a></p>
                </div>
                <?php
                   
                          }
                         }
                          
                ?>
         </div>  
           
           
           
        <?php
include('../Sharing/footer.php');
?>  
    </body>
</html>