<?php
class StoreDAL extends Database
{
    public function getAllStored()
    {
        $query = "SELECT * FROM store";
        $result = mysqli_query($this->connectionString, $query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
        return json_encode($array);
    }
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
    public function getStoreDay($userID, $productID)
    {
        $query = "SELECT StoreDay FROM store WHERE UserID = $userID AND ProductID = $productID";
        $result = mysqli_query($this->connectionString, $query);
        $rows = mysqli_fetch_assoc($result);
        return json_encode($rows['StoreDay'] ? $rows['StoreDay'] : "");
    }
    public function updateStoreDay($userID, $productID, $storeDay)
    {
        $query = "UPDATE store SET StoreDay = '$storeDay' WHERE UserID = $userID AND ProductID = $productID";
        return json_encode(mysqli_query($this->connectionString, $query));
    }
    public function insertStore($userID, $productID)
    {
        $query = "INSERT store VALUES (NULL,$userID,$productID,1,NULL)";
        return json_encode(mysqli_query($this->connectionString, $query));
    }
    public function removeItem($userID, $productID)
    {
        $query = "DELETE FROM store WHERE UserID = $userID AND ProductID = $productID";
        return json_encode(mysqli_query($this->connectionString, $query));
    }
    public function clearStored($userID)
    {
        $query = "DELETE FROM store WHERE UserID = $userID";
        return json_encode(mysqli_query($this->connectionString, $query));
    }
}
