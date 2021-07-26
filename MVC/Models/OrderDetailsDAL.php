<?php
class OrderDetailsDAL extends Database
{
    public function insertOrderDetail($orderID, $productID)
    {
        $query = "INSERT orderdetails VALUES ($orderID,$productID)";
        return json_encode(mysqli_query($this->connectionString, $query));
    }
}
