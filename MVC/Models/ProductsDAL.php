<?php
class ProductsDAL extends Database
{
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
    public function getProductByID($productID){
		$query = "SELECT * FROM products WHERE ID = $productID LIMIT 1";
		$result = mysqli_query($this->connectionString,$query);
		return json_encode(mysqli_fetch_assoc($result));
	}
}
