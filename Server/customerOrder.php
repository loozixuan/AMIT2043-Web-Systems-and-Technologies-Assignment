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
            <p style="background-color:#F0F0F0;width:93%;padding:16px;margin-left: 38px;font-size: 17px;border-radius: 5px;color:grey;"><a href="homeServer.php" style='background-color:#F0F0F0;color:#0066ff;'>Home</a> / <a href="customerOrder.php" style="background-color:#F0F0F0;color:green">Order</a></p>
               
               <div class="table" style="margin-top: 5%;">       
                <div class="h">Customer Order</div>
                      <table  class="tableUser">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Payment</th>
                        <th>Delivered</th>
                        <th>Cancel</th>
                    </tr>
                 <style>
                     @font-face{
                  font-family: p;
                  src: url(Roboto-Regular.ttf);
                }
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
                        
                        @font-face{
                          font-family: p;
                          src: url(Roboto-Regular.ttf);
                        }
                            .table{
                                 border-radius: 6px;
                                 padding:10px;
                                 border:1px solid #dddddd;
                                 width: 90%;
                                 display: block;
                                 margin-left: auto;
                                 margin-right: auto;
                                 height: 50%;
                                 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                            }
                            .tableUser {
                              margin-left: auto;
                              margin-right: auto;
                              font-family: arial, sans-serif;
                              border-collapse: collapse;
                              width: 100%;
                            }

                            .tableUser th{
                              text-align: center;
                              padding: 15px;
                              color:#101D5F;
                              font-style: normal;
                              font-size: 20px;
                            } 

                            .tableUser td {
                              border-top: 2px solid #dddddd;
                              text-align: center;
                              padding: 16px;
                              font-size: 15px;
                            }

                            .h{
                                font-family: p;
                                transform:translateY(-35px);
                               background-image: radial-gradient(circle, #2609a4, #1d2db8, #1146cb, #095ddc, #1273eb);
                                padding: 23px;
                                width:95.5%;
                                color:white;
                                border-radius: 6px;
                                font-size: 28px;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
                               
                            }
                            i{
                                 font-size:1.3em;
                            }
                            i:hover{
                                color:red;
                               
                            }
                          
                            a:hover{
                                color:#0033cc;
                            }
                            
                </style>   
                <?php
                require('mysqli_connect.php'); // Connect to the dba.
                $q="SELECT * FROM orders";
                $result=mysqli_query($dbc,$q);
                $num=mysqli_num_rows($result);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $orderNo=$row['orderNo'];
                        $custID=$row['custID'];
                        if($row['orderStatus']=="Cancel"){
                            $color="red";
                        }else if($row['orderStatus']=="Shipping"){
                            $color="green";
                        }else{
                            $color="blue";
                        }
             
                        echo"<tr><td ><a href='orderDetail.php?action=view&orderNo=$orderNo&custID=$custID' style='background-color: white;color:#0066ff;'>{$row['orderNo']}</a></td><td>{$row['custID']}</td><td>{$row['orderDate']}</td><td style='color:$color;'>{$row['orderStatus']}</td><td>{$row['totalAmount']}</td><td><a href='orderDetail.php?action=delivered&orderNo=$orderNo&custID=$custID' ><input type='submit' name='submit' value='Shipping' ></a></td><td><a href='orderDetail.php?action=cancel&orderNo=$orderNo&custID=$custID' style='color:black;background-color:white;'><i class='fas fa-trash-alt'></i></a></td>";                 
                    }
                }
                   
                  
             

                $dbc->close();

                ?>
                </table>
                </div>
                </div>
                
            
              
    </div>              
</body>
</html>