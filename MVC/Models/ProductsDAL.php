<?php
class ProductsDAL extends Database
{
    public function countProduct(){
		$query = "SELECT ID FROM products";
		$result = mysqli_query($this->connectionString,$query);
		return json_encode(mysqli_num_rows($result));
	}
    public function getAllProduct()
    {
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->connectionString, $query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function getProduct()
    {
        $query = "SELECT * FROM products WHERE Status = true";
        $result = mysqli_query($this->connectionString, $query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function insertProduct($productName,$cateID,$quantity){
		$query = "INSERT products VALUES (NULL,'$productName',$cateID,$quantity,$quantity,NOW(),1)";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
    public function editProduct($productID,$productName,$productCate,$newQuantity,$status){
		$query = "UPDATE products SET ProductName = '$productName', IDCate = $productCate, Quantity = $newQuantity, Status = $status WHERE ID = $productID";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
    public function removeProduct($productID){
		$query = "DELETE FROM products WHERE ID = $productID";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
    public function getProductAdvanced($keyWord,$category,$status)
    {
        $query = "";
        if ($category == "Tất cả") {
            if ($keyWord == ""){
                $query = "SELECT * FROM products WHERE Quantity > 0 AND Status = true";
            }
            else {
                $query = "SELECT * FROM products WHERE ProductName LIKE '%$keyWord%' AND Quantity > 0 AND Status = true";
            }
        }
        else{
            if ($keyWord == ""){
                $query = "SELECT * FROM products WHERE IDCate = $category AND Quantity > 0 AND Status = true";
            }
            else {
                $query = "SELECT * FROM products WHERE ProductName LIKE '%$keyWord%' AND IDCate = $category AND Quantity > 0";
            }
        }
        $result = mysqli_query($this->connectionString, $query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function getProductByID($productID){
		$query = "SELECT * FROM products WHERE ID = $productID LIMIT 1";
		$result = mysqli_query($this->connectionString,$query);
		return json_encode(mysqli_fetch_assoc($result));
	}
    public function getProductNameByID($productID){
		$query = "SELECT ProductName FROM products WHERE ID = $productID";
		$result = mysqli_query($this->connectionString,$query);
		$rows = mysqli_fetch_assoc($result);
		return json_encode($rows['ProductName']);
	}
    public function updateQuantity($productID,$amountQuantity){
		$query = "UPDATE products SET Quantity = Quantity + ($amountQuantity) WHERE ID = $productID";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
}
