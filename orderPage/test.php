<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        .info {
          margin-top: 5px;
          padding: 0px;
          background-color: #808080	;
          color: white;
          border: 1px solid black;
          width: 600px;
          display: block;
          margin-left: 20px;
        }
        
        .info p{
            font-size: 15px;
            margin-left: 10px;
        }

        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 30px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
        </style>
    </head>
    <body style="margin-top:45px;">
         <?php
          include('../Sharing/header.php');
         ?>
        <div class="info">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <p><i style="font-size:19px;">Information: Possible Delay<br></i> Packages shipped to or from areas red zones may experience delays.<p>
        </div>
        
        
       
    </body>
</html>
