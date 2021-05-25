<?php
class ProductDAL extends Database{
    public function countTotalProduct(){
        $query = "SELECT ID FROM product";
        $result = mysqli_query($this->connectionString,$query);
        return json_encode(mysqli_num_rows($result));
    }
    public function getProductByPage($page,$pageSize){
        $skip = ($page-1)*$pageSize;
        $query = "SELECT * FROM product LIMIT $pageSize OFFSET $skip";
        $result = mysqli_query($this->connectionString,$query);
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)){
            $array[] = $rows;
        }
        return json_encode($array);
    }
}
