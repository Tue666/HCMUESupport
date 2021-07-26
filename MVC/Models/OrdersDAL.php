<?php
class OrdersDAL extends Database
{
    public function insertOrder($customerID,$customerName,$customerEmail,$customerAddress,$customerPhone,$MSSV,$khoa,$place,$address,$note){
		$query = "INSERT orders VALUES (NULL,$customerID,'$customerName','$customerEmail','$customerAddress','$customerPhone','$MSSV','$khoa','$place','$address','$note',NOW(),0)";
		if (mysqli_query($this->connectionString,$query)){
			return json_encode(mysqli_insert_id($this->connectionString));
		}
	}
}
