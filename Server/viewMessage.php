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
        
    </head>
    <body>
        <div class="search">
            <?php
                require ("searchBar.php");
            ?>
       </div>
        
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
            .mainTable{
                width: 81%;
                box-sizing: border-box;
            }
            .messageTable{              
              border-collapse: collapse;
              text-align: center;
            }
            
            .messageTable tr:nth-child(even) 
            {background-color: #f2f2f2;
            }
            
            .messageTable th{
                font-size: 18px;
                text-align: center;
                padding-left: 7px;      
                padding-right: 7px; 
                background-image: linear-gradient(to bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12);
                color:white;
                font-family: p;
            }
            
            .messageTable tr,td{
                padding: 6px;
            }
            td a:first-of-type{
               margin-right: 10px;
                
            }
            td a:nth-of-type(2){
                 margin-right: 0px;
            }
            #msg{
                display: flex;
                justify-content: center;
                font-size: 35px;
            }
            .tableUser  a img{
                background-color:white !important;
            }
           
        </style>
        
        <div class="mainBody">
            <div class="header" style="height: 800px;">
                <?php
                require ("index.php");
                ?>
            </div>
            
            <div class="mainTable">
                <p style="background-color:#F0F0F0;width:93%;padding:12px;margin-left: 38px;font-size: 17px;border-radius: 5px;color:grey;">Home / <a href="viewMessage.php" style="background-color:#F0F0F0;color:green">Message</a></p>
                <div class="table" style="margin-top: 5%;">       
                <div class="h">Message Board</div>
                      <table  class="tableUser">
                    <tr>
                        <th>Comment ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th style="padding: 10px;">Message</th>
                        <th>Action</th>
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
                                 padding:24px;
                                 border:1px solid #dddddd;
                                 width: 80%;
                                 display: block;
                                 margin-left: auto;
                                 margin-right: auto;
                                 height: 52%;
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
                              color:burlywood;
                              font-style: normal;
                              font-size: 18px;
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
                               background-image: linear-gradient(to left top, #1c09ff, #5d32fd, #7e4ffb, #9869f8, #ad83f6);
                                padding: 23px;
                                width:95.5%;
                                color:white;
                                border-radius: 6px;
                                font-size: 28px;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
                               
                            }
                </style>   
               <?php
                 require('mysqli_connect.php'); 
                  $q="SELECT * FROM message WHERE status='available'";
                  $result=mysqli_query($dbc,$q);
              
                   $num=mysqli_num_rows($result);
                   if($result->num_rows>0){
                       while($row = $result->fetch_assoc()){
                           echo"</tr><td>{$row['commentID']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['comment']}</td>"
                           ."<td style='padding:15px;'><a href='replyEmail.php?email={$row['email']}'><img src='images/email.png'/></a><a href='deleteMessage.php?email={$row['email']}'><img src='images/deleteM.png'/></a></tr>";                                  
                       
                     
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
