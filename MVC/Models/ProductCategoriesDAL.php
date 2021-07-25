<?php
class ProductCategoriesDAL extends Database
{
    public function getCategories()
    {
        $query = "SELECT * FROM productcategories WHERE Status = true ORDER BY DisplayOrder";
        $result = mysqli_query($this->connectionString, $query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
        return json_encode($array);
    }
    public function getCategoryByID($cateID)
    {
        $query = "SELECT * FROM productcategories WHERE ID = $cateID AND Status = true LIMIT 1";
		$result = mysqli_query($this->connectionString,$query);
		return json_encode(mysqli_fetch_assoc($result));
    }
}
