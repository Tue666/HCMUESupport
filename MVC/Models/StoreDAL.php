<?php
class StoreDAL extends Database
{
    public function getStored($userID)
    {
        $query = "SELECT ProductID FROM store WHERE UserID = $userID AND Status = true";
        $result = mysqli_query($this->connectionString, $query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function insertStore($userID,$productID){
        $query = "INSERT store VALUES (NULL,$userID,$productID,1)";
        return json_encode(mysqli_query($this->connectionString,$query));
    }
}
