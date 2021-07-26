<?php
class OrdersDAL extends Database
{
	public function countTotalRecords($userID){
        $query = "SELECT ID FROM orders WHERE CustomerID = $userID";
        $result = mysqli_query($this->connectionString,$query);
        return json_encode(mysqli_num_rows($result));
    }
    public function getOrderByID($orderID){
		$query = "SELECT * FROM orders WHERE ID = $orderID";
		$result = mysqli_query($this->connectionString,$query);
		return json_encode(mysqli_fetch_assoc($result));
	}
	public function getOrdersByPage($userID,$page,$pageSize){
        $skip = ($page-1)*$pageSize;
        $query = "SELECT * FROM orders WHERE CustomerID = $userID ORDER BY CreatedDay DESC LIMIT $pageSize OFFSET $skip";
        $result = mysqli_query($this->connectionString,$query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)){
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function insertOrder($customerID,$customerName,$customerEmail,$customerAddress,$customerPhone,$MSSV,$khoa,$place,$address,$note){
		$query = "INSERT orders VALUES (NULL,$customerID,'$customerName','$customerEmail','$customerAddress','$customerPhone','$MSSV','$khoa','$place','$address','$note',NOW(),0)";
		if (mysqli_query($this->connectionString,$query)){
			return json_encode(mysqli_insert_id($this->connectionString));
		}
	}
}
