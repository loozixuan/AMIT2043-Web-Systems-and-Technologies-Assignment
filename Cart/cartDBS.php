<?php
class Cart {
	
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn=new mysqli("localhost","root","","wst");
                if($conn === false){
            die("ERROR: Could not connect. " . $conn->connect_error);
              }
		return $conn;
	}
        function editCart(){
        if (! empty($_SESSION["cart_item"])) {
            $total_price = 0;
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($_POST["code"] == $k) {
                    $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                }
                $total_price = $total_price + ($_SESSION["cart_item"][$k]["quantity"] * $_SESSION["cart_item"][$k]["price"]);
            }
            return $total_price;
        }

        if (! empty($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
            $this->cartSessionItemCount = count($_SESSION["cart_item"]);
        }
    }

	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>