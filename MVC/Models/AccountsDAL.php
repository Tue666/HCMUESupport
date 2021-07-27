<?php
class AccountsDAL extends Database
{
	public function countAccount($type){
		$query = "SELECT ID FROM accounts WHERE Type = $type";
		$result = mysqli_query($this->connectionString,$query);
		return json_encode(mysqli_num_rows($result));
	}
	public function checkExist($userName)
	{
		$query = "SELECT * FROM accounts WHERE UserName = '$userName'";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_num_rows($result) > 0);
	}
	public function checkLogin($userName)
	{
		$query = "SELECT PassWord,Status FROM accounts WHERE UserName = '$userName' LIMIT 1";
		$result = mysqli_query($this->connectionString, $query);
		$rows = mysqli_fetch_assoc($result);
		$PassWord = '';
		$Status = 0;
		if (isset($rows['PassWord'])) {
			$PassWord = $rows['PassWord'];
			$Status = $rows['Status'];
		} else {
			$PassWord = '';
			$Status = -1;
		}
		return json_encode(['PassWord' => $PassWord, 'Status' => $Status]);
	}
	public function getListAccount(){
		$query = "SELECT * FROM accounts";
		$result = mysqli_query($this->connectionString,$query);
		$array = array();
		while ($rows = mysqli_fetch_assoc($result)){
			$array[] = $rows;
		}
		return json_encode($array);
	}
	public function insertAccount($userName, $passWord, $type = 0)
	{
		$query = "INSERT accounts VALUES (NULL,'$userName','$passWord',NULL,NULL,NULL,NULL,NOW(),$type,0)";
		return json_encode(mysqli_query($this->connectionString, $query));
	}
	public function updateAccount($userID,$name,$userEmail,$userPhone,$userAddress,$userType,$userStatus){
		$query = "UPDATE accounts SET Name = '$name', Email = '$userEmail', Phone = '$userPhone', Address = '$userAddress', Type = $userType, Status = $userStatus WHERE ID = $userID";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
	public function removeAccount($userID){
		$query = "DELETE FROM accounts WHERE ID = $userID";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
	public function resetPassword($userID,$passWord){
		$query = "UPDATE accounts SET PassWord = '$passWord' WHERE ID = $userID";
		return json_encode(mysqli_query($this->connectionString,$query));
	}
	public function getAccountByName($userName)
	{
		$query = "SELECT * FROM accounts WHERE UserName = '$userName' LIMIT 1";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_fetch_assoc($result));
	}
	public function getAccountByID($userID)
	{
		$query = "SELECT * FROM accounts WHERE ID = '$userID' LIMIT 1";
		$result = mysqli_query($this->connectionString, $query);
		return json_encode(mysqli_fetch_assoc($result));
	}
}
