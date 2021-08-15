<?php
class OrdersDAL extends Database
{
	public function countOrder($status)
	{
		$query = "SELECT ID FROM orders WHERE Status = $status";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_num_rows($result));
	}
	public function countTotalRecords($userID)
	{
		$query = "SELECT ID FROM orders WHERE CustomerID = $userID";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_num_rows($result));
	}
	public function switchStatus($orderID)
	{
		$query = "UPDATE orders SET Status = !Status WHERE ID = $orderID";
		return (mysqli_query($this->connectionString, $query));
	}
	public function getLastOrdered($userID)
	{
		$query = "SELECT * FROM orders WHERE CustomerID = $userID ORDER BY CreatedDay DESC LIMIT 1";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_fetch_assoc($result));
	}
	public function getListOrders()
	{
		$query = "SELECT * FROM orders";
		$result = mysqli_query($this->connectionString, $query);
		$array = array();
		while ($rows = mysqli_fetch_assoc($result)) {
			$array[] = $rows;
		}
		return json_encode($array);
	}
	public function getOrderByID($orderID)
	{
		$query = "SELECT * FROM orders WHERE ID = $orderID";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_fetch_assoc($result));
	}
	public function getOrderByUserID($userID)
	{
		$query = "SELECT * FROM orders WHERE CustomerID = $userID ORDER BY CreatedDay DESC";
		$result = mysqli_query($this->connectionString, $query);
		$array = array();
		while ($rows = mysqli_fetch_assoc($result)) {
			$array[] = $rows;
		}
		return json_encode($array);
	}
	public function getOrdersByPage($userID, $page, $pageSize)
	{
		$skip = ($page - 1) * $pageSize;
		$query = "SELECT * FROM orders WHERE CustomerID = $userID ORDER BY CreatedDay DESC LIMIT $pageSize OFFSET $skip";
		$result = mysqli_query($this->connectionString, $query);
		$array = array();
		while ($rows = mysqli_fetch_assoc($result)) {
			$array[] = $rows;
		}
		return json_encode($array);
	}
	public function getCreatedDay($orderID)
	{
		$query = "SELECT CreatedDay FROM orders WHERE ID = $orderID";
		$result = mysqli_query($this->connectionString, $query);
		$rows = mysqli_fetch_assoc($result);
		return json_encode($rows['CreatedDay']);
	}
	public function insertOrder($customerID, $customerName, $customerEmail, $customerAddress, $customerPhone, $MSSV, $object, $khoa, $place, $address, $note)
	{
		$query = "INSERT orders VALUES (NULL,$customerID,'$customerName','$customerEmail','$customerAddress','$customerPhone','$MSSV','$object','$khoa','$place','$address','$note',NOW(),NULL,0)";
		if (mysqli_query($this->connectionString, $query)) {
			return json_encode(mysqli_insert_id($this->connectionString));
		}
	}
	public function updateReceivedDay($orderID, $receivedDay)
	{
		$query = "UPDATE orders SET ReceivedDay = '$receivedDay' WHERE ID = $orderID";
		return (mysqli_query($this->connectionString, $query));
	}
	public function updateStatus($orderID, $status)
	{
		$query = "UPDATE orders SET Status = $status WHERE ID = $orderID";
		return (mysqli_query($this->connectionString, $query));
	}
}
