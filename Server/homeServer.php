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
        <link href="../Sharing/base.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <title>Kwong Tat Watches Store</title>
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
            .col-1-3{
                float: left;
                width:26%;
                margin-left: 5.5%;
                color:white;
                border-radius: 3px;
            }
            #box1{
                background-color: #4CAF50;
                text-align: center;
            }
            #box2{
                background-color: #FFA500;
                text-align: center;
            }
            #box3{
                background-color: #000080;
                text-align: center;
            }
            .col-1-3 a{
                  color:white;
            }
        </style>
    </head>
    
    <body>
       <div>
            <?php
           
                require ("searchBar.php");
            ?>
       </div>
        
       <div class="mainBody">        
           <div class="header" >
                <?php
                require ("index.php");
               
                ?>
            </div>
           
            <div class="main">
                <p style="background-color:#F0F0F0;width:90%;padding:12px;margin-left: 4%;font-size: 17px;border-radius: 5px;color:grey;">Home</p><br>
                <div class="col-1-3" id="box1" style="height:26%;"><br>
                    <a href="viewMessage.php"><img src="images/mail.png" />
                    <p style="font-size:20px;margin-top: 10px;"><b>Message Box</b></p>          
                    <p style="font-size:16px;">View message</p></a>
                </div>
                
                <div class="col-1-3" id="box2" style="height:26%;"><br>
                    <a href="customerOrder.php"><img src="images/order.png"/>
                    <p style="font-size:20px;margin-top: 10px;"><b>Order List</b></p>
                    <p style="font-size:16px;margin-top: 0px;">View order</p></a>
                </div>
                
                <div class="col-1-3" id="box3" style="height:26%;"><br>
                    <a href="viewUserInfo.php"><img src="images/support.png"/>
                    <p style="font-size:20px;margin-top: 10px;"><b>Customer Info</b></p>
                    <p style="font-size:16px;margin-top: 0px;">View info</p></a>
                </div>
                <br><br> <br><br> <br><br>
                <style>
                    @font-face{
                  font-family: p;
                  src: url(Roboto-Regular.ttf);
                }
                    .table{
                         border-radius: 6px;
                         padding:22px;
                         border:1px solid #dddddd;
                         width: 60%;
                         display: block;
                         margin-left: auto;
                         margin-right: auto;
                         height: 350px;
                         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    }
                    .tableUser {
                      margin-left: 38px;
                      font-family: arial, sans-serif;
                      border-collapse: collapse;
                      width: 90%;
                    }
                    
                    .tableUser th{
                      text-align: center;
                      padding: 18px;
                      color:orange;
                      font-style: normal;
                      font-size: 18px;
                    } 

                    .tableUser td {
                      border-top: 2px solid #dddddd;
                      text-align: center;
                      padding: 16px;
                        font-size: 16px;
                    }

                    .h{
                        font-family: p;
                        transform:translateY(-35px);
                        background-color: rgb(146, 35, 146);
                        padding: 25px;
                        width:681px;;
                        color:white;
                        border-radius: 6px;
                        font-size: 27px;
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
                    }
                </style>
                <br><br> <br><br>
                <div class="table" style=" margin-top: 10%;">       
                    <div class="h">REGISTER USER(S)</div>
                    <table class="tableUser">
                      
                        <tr style="margin-top: 2px;">
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>DOB</th>
                        </tr>
                          
                       <?php
             
                     require('mysqli_connect.php'); // Connect to the dba.
                      $q="SELECT * FROM user";
                      $result=mysqli_query($dbc,$q);

                       $num=mysqli_num_rows($result);
                       if($result->num_rows>0){
                           while($row = $result->fetch_assoc()){
                               echo"</tr><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['tel']}</td><td>{$row['dob']}</td>";                                             
                            }                                   
                       }
                    $dbc->close();
                    ?>
                  
                    </table>
                </div>
               <br><br> <br><br>
            </div>

           </div>
   
    </body>
</html>
