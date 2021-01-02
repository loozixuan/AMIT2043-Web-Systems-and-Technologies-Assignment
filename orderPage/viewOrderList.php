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
        <link href="viewOrderList.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      
    </head>
    
    <body style="margin-top:45px;margin-bottom: 0;">
        
         <?php
         include('../Sharing/header.php');
        
         //create connection
         ?>
        <style>
             .searchBar{
                display: flex;
                justify-content: center;
            }
             .searchBar input[type="text"]{
                width: 35%;
                padding: 13px;
                border-radius: 4px;
            }
             .searchBar input[type="submit"]{
                width: 35%;
                padding: 13px;
                border-radius: 4px;
            }
            
            .tableUser a:hover{
                color:lightcoral;
                text-decoration: none;
            }
            .tableUser a {
                color:green;
            }
          .tableUser th{
                  font-family: p;
                  border-top: 2px solid white !important;
                  border-bottom: 2px solid white !important;               
                  text-align: center;
                  padding: 18px;
                  color:lightseagreen;
                  font-style: normal;
                  font-size: 1.4em;
                 
                }
                 .container {
              border: 2px solid #dedede;
              background-color: #f1f1f1;
              border-radius: 5px;
              padding: 10px;
              padding-top: 10px;
              margin-left: 5%;
              margin-top: 3%;
            }

            .darker {
              border-color: #ccc;
              background-color: #ddd;
             
            }

            .container::after {
              content: "";
              clear: both;
              display: table;
            }

            .container img {
              float: left;
              max-width: 60px;
              width: 100%;
              margin-right: 20px;
              border-radius: 50%;
            }

            .container img.right {
              float: right;
              margin-left: 20px;
              margin-right:0;
            }

            .time-right {
              float: right;
              color: #aaa;
            }

            .time-left {
              float: left;
              color: #999;
            }
            .box{
             text-align:center;
             font-size: 22px;
             border:2px solid tomato;
             width:22%;
             margin-left: 3%;         
             padding:15px;
            }

            .box3{
              border-width: 5px 3px 3px 5px;
              border-radius:95% 4% 97% 5%/4% 94% 3% 95%;
              transform: rotate(1deg);
            }

            .oddboxinner{
              margin:15px;
             
            }
            .boxs  {
              background-color: #e7f3fe;
                border-left: 6px solid #2196F3;
              padding: 8px;
              width:28%;
              margin-left: 3%;
              font-size: 15px;
              text-align: center;
            }
            .boxs a{
                color:black;
            }
            .boxs a:hover{
                color:red;
                text-decoration: none;
            }
              #header{
                font-size: 6em;
                margin-left: 28%;
                margin-top: 2%;
                color: white;
                font-family: order;
            }
             input[type="submit"]{
                    background-color: lightskyblue;
                    border: none;
                    color: white;
                    text-decoration: none;
                    margin: 4px 2px;
                    cursor: pointer;
                   
            }
            input[type="submit"]:hover{
                background-color: lightgreen;
            }
            
            .sidebar table{
                margin-left: 40px;
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
        $dbc = new mysqli("localhost", "root", "", "wst");
        ?>
        
         <div class="order">  
                <br><br><br><br>
                <h1 id='header'>Order Details</h1><br><br><br>        
                <form action="searchOrder.php" class="searchBar" method="post">
                    <input type="text" placeholder="Tracking your Order..." name="search" value="<?php if(isset( $_REQUEST['orderNo'])){echo $_REQUEST['orderNo'];}?>">
                   <input type="submit" name="submit" value="Track" style="padding: 15px;width: 5%;font-size: 18px;text-align: center;">
                </form>               
        </div>
         
        
        <div class="column2" style="width: 25%;min-height:500px;">
            <div class="sidebar" >
                <h1>My Account</h1>
                <table>
                    <tr>
                        <td><a href="../Account/account.php" style="color:#808080;"><i class="fa fa-user" aria-hidden="true"></i> Account Details</a></td>
                    </tr>
                    <tr>
                        <td style=" color:black;background-color: white;border-left: 3px solid blue; "><a href="orderStatus.php?orderNo=<?php echo $orderNo?>&email=<?php echo $email?>" style="color:black;"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Orders</a></td>
                    </tr>
                    <tr>
                        <td><a href="../Sharing/Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></td>
                    </tr>

                </table>
            </div>
        </div>
     
       
        <?php
           if (isset($_SESSION['Logemail'])) {
                   $email=$_SESSION['Logemail'];
                   

        // Check connection
        if($dbc === false){
            die("ERROR: Could not connect. " . $dbc->connect_error);
        }      
         mysqli_set_charset($dbc, 'utf8');
          
         ?>
         <div class="column">
             <div class="mainTable">
                   
            <table class="tableUser" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 6px;">
                <tr>
                    <th>Order No</th>                    
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Order Status</th>
                </tr>
                
             
                    <!-- order and customer database-->
                   <?php                
                      $sql="select * FROM orders O, customer C where C.custID=O.custID AND C.email='$email'";
                      $result= $dbc->query($sql);
                      while($row = $result->fetch_assoc()){
                   ?>    
                <tr>
                    <td><a href="orderStatus.php?email=<?php echo $email ?>&custID=<?php echo $row['custID']?>&orderNo=<?php echo $row['orderNo']?>"><?php echo $row['orderNo']?></a></td>                   
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['phoneNo']?></td>
                    <td><?php echo $row['address']?></td>
                    <td class="status"><?php echo $row['orderStatus']?></a></td>
                   <?php      
               
                        }      
                        ?> 
                   </tr>     
            </table>
             </div>  
        </div>   
      <?php    
           }else{
                $orderNo="";
                if(isset($_REQUEST['orderNo'])){
                      $orderNo=$_REQUEST['orderNo'];           
                }             
       ?>
        <br>
            
            <h2 style="text-align: center;font-size: 35px;   margin-left: 14.5%;">Why I cannot see my order information?<hr></h2>
                  <div class="column">
      <?php
                  $sql="select * FROM orders where orderNo='$orderNo'";
                  $result= $dbc->query($sql);
                  while($row = $result->fetch_assoc()){
                ?>
             
              <p class="box box3" style="width:35%;font-size: 20px;text-align: center;padding: 8px;"><b>Your Order Number : </b><?php echo  $row['orderNo'] ?></p>
              <div><p class="boxs box4" style=" width:50%;background-color: #ffffcc;border-left: 6px solid #ffeb3b;"><img src="idea.png" style="margin-top:-6px;margin-right: 5px;"> Uses the <strong>order number</strong> provided to track your order.</p></div> 
               <?php
                }
                ?> 
              <div class="container darker">
                    <img src="admin.png" alt="csStaff" class="right" style="width:100%;">
                  <p>Good morning Sir. I'm Teck Ken from Customer Service Department. What can I help?</p>
                  <span class="time-left">11:01a.m.</span>
                </div>
                 
                      <div class="container">
                   <img src="customer.png" alt="customer" style="width:100%;">
                  <p>Hello Sir, I have one question about my ORDER INFORMATION. Why I only receive order number after placing an order. How should I track my order status?</p>
                  <span class="time-right">11:00a.m.</span>
               </div>

                <div class="container darker">
                  <img src="admin.png" alt="CsStaff" class="right" style="width:100%;">
                  <p>If a customer haven't register an account on our online store, the customer will 
                      need to use the <b style="color:green;font-size: 17px;">Search Engine above</b> to search for his/her order's status. You can also register an
                      account from this link <a href="../Sharing/SignUp.php">SIGN UP HERE</a> to obtain your order status instantly.</p>
                  <span class="time-left">11:05a.m.</span>
                </div>
                
                
                <div class="container">
                    <img src="customer.png" alt="customer" style="width:100%;">
                  <p>Oh thanks, now I know what should I do.</p>
                  <span class="time-right">11:02a.m.</span>
                </div>
                <div class="container darker">
                    <img src="admin.png" alt="csStaff" class="right" style="width:100%;">
                  <p>You're welcome. Have a nice day !</p>
                  <span class="time-left">11:01a.m.</span>
                </div>
           </div>
        <?php
              
           }
       ?>
        <?php
            include('../Sharing/footer.php');
        ?>  
    </body>
</html>