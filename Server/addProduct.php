
<!DOCTYPE html>

<html>
    <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lee Sin Meai">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>
  <link href="addProduct.css" type="text/css" rel="stylesheet" />
    
    </head>
    <body>
        <div>
            <?php
                require ("searchBar.php");
            ?>
       </div>
        
        <?php 


            $conn=new mysqli("localhost","root","","wst");
            if($conn === false){
            die("ERROR: Could not connect. " . $conn->connect_error);
              }
              $pic_name1=$pic_name2=$pic_name3=$pic_name4=$uploadOk=$genderErr=$brandErr="";
              $prodNameErr=$priceErr=$descErr=$message=$imageErr1=$imageErr2=$imageErr3=$quantityErr="";
              $imageName=array();
        if ($_SERVER['REQUEST_METHOD']=='POST'){
    
            $prod_name=$_POST['prod_name'];
            if(empty($_POST['prod_name'])){
                 $prodNameErr="Please enter the Product Name.";
            }
            
                   
            $duplicateID= mysqli_query($conn, "select * from product where prod_name='$prod_name'");
           if(mysqli_num_rows($duplicateID)>0){
                     $prodNameErr="The Product Name already exist";
            }
            else{
                $prod_name = $conn->real_escape_string($_POST['prod_name']);
            }
            if(empty($_POST['price'])){
                
               $priceErr="Please enter the price.";
           }
           else{
               $price = $conn->real_escape_string($_POST['price']);
           }
           if(empty($_POST['quantity'])){
                
               $quantityErr="Please enter the quantity.";
           }
           else{
               $quantity = $conn->real_escape_string($_POST['quantity']);
           }
           if(empty($_POST['brand'])){
                
               $brandErr="Please enter the brand name.";
           }
           else{
               $brand = $conn->real_escape_string($_POST['brand']);
           }
           if(empty($_POST["gender"])){
                $genderErr="Gender is required!";
            }
            else{
                $gender = $_POST["gender"];
               
            }
           if(empty($_POST['descProd'])){
               $descErr="Please enter the description.";
           }
           else{
               $descProd=$conn->real_escape_string($_POST['descProd']);
           }
      
           
if($prodNameErr==""&&$priceErr==""&&$descErr==""){  
 //check upload
 if(isset($_FILES['fileToUpload'])){
$target_dir = "uploads/";

$uploadOk = 1;
$total=count($_FILES['fileToUpload']['name']);

 for($i=0;$i<$total;$i++){
   
     $target_file[$i] = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);

if (file_exists($target_file[$i])) {
  $imageErr1= "Sorry, file already exists./Please upload a picture.";
  $uploadOk = 0;
}    
 }
 

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 $imageErr2= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else if($prodNameErr==""&&$priceErr==""&&$descErr==""&&$imageErr1==""&&$imageErr2==""&&$imageErr3==""&&$quantityErr==""){
     
    for($i=0;$i<$total;$i++){
        $tmpFilePath=$_FILES['fileToUpload']['tmp_name'][$i];
        if($tmpFilePath!=""){
            
            $newFilePath="./uploads/" . $_FILES['fileToUpload']['name'][$i];
  if (move_uploaded_file($tmpFilePath, $newFilePath)) {
    $imageName[$i]= "../Server/uploads/" . $_FILES['fileToUpload']['name'][$i];;
 
  } else {
   $imageErr3= "Sorry, there was an error uploading your file.";
  }
        }
    }
}

 }
}

for ($i=0; $i < count($imageName); $i++){ 
   $pic_name1=$imageName[0];
   $pic_name2=$imageName[1];
   $pic_name3=$imageName[2];
  
  
    }
      $row=mysqli_query($conn,"select * from product");
        $num=mysqli_num_rows($row);
        $i=1;
        if($num==0){
            $i=1;
        }else{  
            $i+=$num;
        } 
        $code="P100".$i;
            
            if($prodNameErr==""&&$priceErr==""&&$descErr==""&&$imageErr1==""&&$imageErr2==""&&$imageErr3==""&&$quantityErr==""&&$uploadOk == 1){
               $sql = "INSERT INTO product (code,brand,prod_name,gender,price,quantity,pic_name1,pic_name2,pic_name3,prod_desc,status)VALUES ('$code','$brand','$prod_name','$gender', $price,$quantity,'$pic_name1','$pic_name2','$pic_name3','$descProd','available')";
                if($conn->query($sql) === true){ //object-oriented
                   $message="<p><b>$prod_name</b> insert successfully.<a href='viewProduct.php' style=' background-color:white;'>[Product List]</a></p>";
                } else{
                    $message= "ERROR: Could not able to execute $sql." ;
                }
                }
   
}          
             mysqli_close($conn);

           
        ?>

        <div class="mainBody">
            <div class="header" style="background: #333;">
                <?php
                require ("index.php");
                ?>
            </div>
                
            
            <div class="addProd">
                <p style="background-color:#F0F0F0;width:93%;padding:12px;margin-left: 0px;font-size: 17px;border-radius: 5px;color:grey;">Home / Product / <a href="addProduct.php" style="background-color:#F0F0F0;color:green">Add Product</a></p>
                <div class="uploadMessage">
                    <?php echo '<p >'.$message.'</p>'; ?>
                </div>
                <div  class="imageErr">
                <?php echo '<p>'.$imageErr1.'</p>'; ?>
                <?php echo '<p>'.$imageErr2.'</p>'; ?>
                <?php echo '<p>'.$imageErr3.'</p>'; ?>
                </div>
               
                <h1>Insert Product</h1>
                <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h3 class="banner">Product Detail</h3>

                    <div class="formAdd">
                        <label for="prodName">Product Name :</label>
                        <input class="input1" name="prod_name" type="text" placeholder="Product Name" value="<?php if(isset($_POST['prod_name'])) echo $_POST['prod_name']?>">
                        <?php echo '<p class="errorAdd">'.$prodNameErr.'</p>'; ?>

                    </div>
                    
                       <div class="formAdd">
                        <label for="code">Brand :</label>
                        <input class="input1" name="brand" type="text" placeholder="Brand" value="<?php if(isset($_POST['brand'])) echo $_POST['brand']?>">
                        <?php echo '<p class="errorAdd">'.$brandErr.'</p>'; ?>

                    </div>
                     <div class="formAdd">
                        <label for="prodPrice">Price :</label>
                        <input class="input1" name="price" type="text" placeholder="Price" value="<?php if(isset($_POST['price'])) echo $_POST['price']?>">
                        <?php echo '<p class="errorAdd">'.$priceErr.'</p>'; ?>
                    </div>
                     <div class="formAdd">
                        <label for="prodPrice">Quantity :</label>
                        <input class="input1" name="quantity" type="text" placeholder="Quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity']?>">
                        <?php echo '<p class="errorAdd">'.$quantityErr.'</p>'; ?>
                    </div>
                     <div class="formAdd">
                        <label for="prodPrice">Gender :</label>
                        <span><input class="input3" name="gender" type="radio"  value="F"<?php if(isset($gender)&& $gender=="F") echo "checked";?>>Female</span>
                        <span><input class="input3" name="gender" type="radio"  value="M" <?php if(isset($gender)&& $gender=="M") echo "checked";?>>Male</span>
                        <?php echo '<p class="errorAdd">'.$genderErr.'</p>'; ?>
                    </div>
                     <div class="formAdd">
                        <label for="picName">Upload Picture :</label>
                        <input class="input2" type="file" name="fileToUpload[]">
                    </div>
                    <div class="formAdd">
                        <label for="picName">Upload Picture :</label>
                        <input class="input2" type="file" name="fileToUpload[]">
                    </div>
                    <div class="formAdd">
                        <label for="picName">Upload Picture :</label>
                        <input class="input2" type="file" name="fileToUpload[]">
                    </div>

                    <div class="formAdd">
                        <label for="desc">Description :</label>
                        <textarea class="input1" name="descProd" placeholder="Description" value="<?php if(isset($_POST['descProd'])) echo $_POST['descProd'];?>"></textarea>
                        <?php echo '<p class="errorAdd">'.$descErr.'</p>'; ?>

                    </div>
                    <div class="button">
                        <input class="input2" type="submit" name="submit" value="Submit">
                         <input id="reset" class="input2" type="reset" name="cancel" value="Cancel" onclick="window.location.reload()">
                    </div>

                </form>            
            </div>      
    </div>              
</body>
</html>
addProduct.php
Displaying addProduct.php.