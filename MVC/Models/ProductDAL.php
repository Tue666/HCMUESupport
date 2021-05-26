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
    public function editProduct($productID,$productName,$idCate,$price,$quantity,$discount){
        $query = "UPDATE product SET ProductName = '$productName', IDCate = $idCate, Price = $price, Quantity = $quantity, Discount = $discount WHERE ID = $productID";
        return json_encode(mysqli_query($this->connectionString,$query));
    }
}
