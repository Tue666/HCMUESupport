<?php
class OrderDetailsDAL extends Database
{
    public function insertOrderDetail($orderID, $productID)
    {
        $query = "INSERT orderdetails VALUES ($orderID,$productID)";
        return json_encode(mysqli_query($this->connectionString, $query));
    }
    public function getOrderDetailByOrderID($orderID){
		$query = "SELECT * FROM orderdetails WHERE OrderID = $orderID";
		$result = mysqli_query($this->connectionString,$query);
		$array = array();
		while ($rows = mysqli_fetch_assoc($result)) {
			$array[] = $rows;
		}
		return json_encode($array);
	}
}
