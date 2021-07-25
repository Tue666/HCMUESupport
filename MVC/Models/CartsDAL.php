<?php
class CartsDAL extends Database
{
    public function getCartsByUserID($userID){
        $query = "SELECT * FROM carts WHERE UserID = $userID";
        $result = mysqli_query($this->connectionString,$query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)){
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function insertCart($userID,$productID){
        $query = "INSERT carts VALUES (NULL,$userID,$productID)";
        return json_encode(mysqli_query($this->connectionString,$query));
    }
}
