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
        
    </head>
    <body>
        <div class="search">
            <?php
                require ("searchBar.php");
            ?>
       </div>
        <div class="mainBody">
         <div class="header" style="height: 800px;">
                <?php
                require ("index.php");
                ?>
        </div>
        <div class="main">
                <p style="background-color:#F0F0F0;width:93%;padding:16px;margin-left: 38px;font-size: 17px;border-radius: 5px;color:grey;">Home / <a href="viewCustomerInfo.php" style="background-color:#F0F0F0;color:green">Customer</a></p>
               
               <div class="table" style="margin-top: 5%;">       
                <div class="h">User Info</div>
                      <table  class="tableUser">
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>DOB</th>                     
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
                                 padding:22px;
                                 border:1px solid #dddddd;
                                 width: 80%;
                                 display: block;
                                 margin-left: auto;
                                 margin-right: auto;
                                 height: 50%;
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
                                background-image: linear-gradient(to right top, #ac6911, #bb751b, #c98225, #d88e2e, #e79b37);
                                padding: 23px;
                                width:95.5%;
                                color:white;
                                border-radius: 6px;
                                font-size: 28px;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
                               
                            }
                </style>   
                <?php
                 require('mysqli_connect.php'); // Connect to the dba.
                  $q="SELECT * FROM user";
                  $result=mysqli_query($dbc,$q);

                   $num=mysqli_num_rows($result);
                   if($result->num_rows>0){
                       while($row = $result->fetch_assoc()){
                           echo"<tr><td>{$row['email']}</td><td>{$row['name']}</td><td>{$row['tel']}</td><td>{$row['dob']}</td>";                 
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
