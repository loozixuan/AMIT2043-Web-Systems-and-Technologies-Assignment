<?php
       session_start();
      ?>
<!DOCTYPE html>

<html>
    <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lee Sin Meai">
    <meta name="keywords" content="Kwong Tat,watch">
    <title>Kwong Tat Watches Store</title>
    </head>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body style="margin-top: 45px;">
        <?php
  include('../Sharing/header.php');
  ?>

<?php

 


require_once("cartDBS.php");
$db_handle = new Cart();


if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_REQUEST["quantity"])) {
			$Code = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($Code[0]["code"]=>array('prod_name'=>$Code[0]["prod_name"], 'code'=>$Code[0]["code"], 'quantity'=>$_REQUEST["quantity"], 'price'=>$Code[0]["price"], 'pic_name1'=>$Code[0]["pic_name1"]));
			
			if(!empty($_SESSION["product"])) {
				if(in_array($Code[0]["code"],array_keys($_SESSION["product"]))) {
					foreach($_SESSION["product"] as $k => $v) {
							if($Code[0]["code"] == $k) {
								if(empty($_SESSION["product"][$k]["quantity"])) {
									$_SESSION["product"][$k]["quantity"] = 0;
								}
								$_SESSION["product"][$k]["quantity"] += $_REQUEST["quantity"];
							}
					}
				} else {
					$_SESSION["product"] = array_merge($_SESSION["product"],$itemArray);
                                        
				}
			} else {
				$_SESSION["product"] = $itemArray;
			}
		}
               
	break;
        case "minus":
		if(!empty($_REQUEST["quantity"])) {
			$Code = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($Code[0]["code"]=>array('prod_name'=>$Code[0]["prod_name"], 'code'=>$Code[0]["code"], 'quantity'=>$_REQUEST["quantity"], 'price'=>$Code[0]["price"], 'pic_name1'=>$Code[0]["pic_name1"]));
			
			if(!empty($_SESSION["product"])) {
				if(in_array($Code[0]["code"],array_keys($_SESSION["product"]))) {
					foreach($_SESSION["product"] as $k => $v) {
							if($Code[0]["code"] == $k) {
								if(empty($_SESSION["product"][$k]["quantity"])) {
									$_SESSION["product"][$k]["quantity"] = 0;
								}
                                                                if($_SESSION["product"][$k]["quantity"] != 0){
                                                                     $_SESSION["product"][$k]["quantity"] -= $_REQUEST["quantity"];
                                                                }else if($_SESSION["product"][$k]["quantity"] == 0){
                                                                  foreach($_SESSION["product"] as $k => $v) {
                                                                        if($_GET["code"] == $k)
                                                                                unset($_SESSION["product"][$k]);				
                                                                        if(empty($_SESSION["product"]))
                                                                                unset($_SESSION["product"]);
                                                                }
                                                                }
							}
					}
				} else {
					$_SESSION["product"] = array_merge($_SESSION["product"],$itemArray);
                                        
				}
			} else {
				$_SESSION["product"] = $itemArray;
			}
		}
               
	break;
	case "remove":
		if(!empty($_SESSION["product"])) {
			foreach($_SESSION["product"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["product"][$k]);				
					if(empty($_SESSION["product"]))
						unset($_SESSION["product"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["product"]);
	break;	
}
}
else if(isset($_SESSION['code2'])){
    $Code = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_SESSION["code2"] . "'");
			$itemArray = array($Code[0]["code"]=>array('prod_name'=>$Code[0]["prod_name"], 'code'=>$Code[0]["code"], 'quantity'=>$_SESSION["quantity2"], 'price'=>$Code[0]["price"], 'pic_name1'=>$Code[0]["pic_name1"]));
			
			if(!empty($_SESSION["product"])) {
				if(in_array($Code[0]["code"],array_keys($_SESSION["product"]))) {
					foreach($_SESSION["product"] as $k => $v) {
							if($Code[0]["code"] == $k) {
								if(empty($_SESSION["product"][$k]["quantity"])) {
									$_SESSION["product"][$k]["quantity"] = 0;
								}
								$_SESSION["product"][$k]["quantity"] += $_SESSION["quantity2"];
							}
					}
				} else {
					$_SESSION["product"] = array_merge($_SESSION["product"],$itemArray);
				}
			} else {
				$_SESSION["product"] = $itemArray;
			} 
                      
                 unset($_SESSION["code2"]);
                                     
}   


              
// $_SESSION['item']=$itemArray;
?>



<link href="style.css" type="text/css" rel="stylesheet" />


<div id="shopping-cart">
    <div class="txt-heading"><h1>Shopping Cart</h1></div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php

  
if(isset($_SESSION["product"])){
    $total_quantity = 0;
    $total_price = 0;
?>


<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>

<?php	

   
    foreach ($_SESSION["product"] as $item){
        
        $item_price = $item["quantity"]*$item["price"];
    
        ?>                    
            <tr>
            <td><img src="<?php echo $item["pic_name1"]; ?>" class="cart-item-image" /><?php echo $item["prod_name"]; ?></td>
            <td><?php echo $item["code"]; ?></td>
            <td style="text-align:left;width:7%;"> <a href="cart.php?action=add&code=<?php echo $item["code"]; ?>&quantity=1"><i class="fa fa-plus" aria-hidden="true"></i></a> <input style="width:30px;box-sizing: border-box;" class="qty" type="text" name="quantity" value="<?php echo $item["quantity"]; ?>"><a href="cart.php?action=minus&code=<?php echo $item["code"]; ?>&quantity=1"> <i class="fa fa-minus" id="minus" aria-hidden="true"></i></a></td>
            <td  style="text-align:right"><?php echo "RM ".$item["price"]; ?></td>
            <td  style="text-align:right;"><?php echo "RM ". number_format($item_price,2); ?></td>
            <td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
            </tr>

            <?php

            $total_quantity += $item["quantity"];
            $total_price += ($item["price"]*$item["quantity"]);  
            }
            ?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "RM ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<div class="checkoutAlert"></div>
<div class="checkout-button"><a href="../Checkout/checkout.php"><input type="submit" name="checkout" value="Checkout" ></a></div>

  <?php
  
  
} else {
?>
  <style>
.empty_cart{
    margin:20px 400px 40px 400px;
    padding:10px;
}
.empty_img{
    box-sizing: border-box;
    width:200px;
    margin-left: auto;
    margin-right: auto;
}
.empty_img img{
    width:100%;
}
.empty_txt>p{
    margin-left: 55px;
    margin-right: 30px;
}
                        
.shop{
    border: 2px solid red;
    font-size:1.3em;
    background-color: white;
    margin-right: 55px;
    margin-left: 75px;
    padding:10px;
                           
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
            <p style="font-size:1.3em;text-align: center;"><b>Oops,Your Cart is Empty</b></p>
            <p style="text-align:center">Browse our awesome deals now!</p>
            <a href="../ProductCatalog/productPageW.php"> <button style="display:block;margin-left: auto;margin-right: auto;" class="shop">Go Shopping Now</button></a>
        </div>
    </div>

<?php 
}
?>
</div>

<div id="product-grid" >
    <div class="txt-heading"><h3>Recommended Products</h3></div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product WHERE code IN ('P1001','P1002','P1003','P1004')");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item"  style="margin-bottom: 80px;">
                    <form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <div class="product-image"><a href="../ProductDetails/productDetail.php?code=<?php echo $product_array[$key]["code"]; ?>" ><img src="<?php echo $product_array[$key]["pic_name1"]; ?>"></a></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["prod_name"]; ?></div>
                        <div class="product-price"><?php echo "RM".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
		    </form>
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