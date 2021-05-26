<?php
class Ajax extends ViewModel{
    protected $product;
    function __construct(){
        $this->product = $this->getModel('ProductDAL');
    }
    public function loadData(){
        $page = $_POST['page'];
        $pageSize = 7;
        $productsByPage = json_decode($this->product->getProductByPage($page,$pageSize),true);
        $output = '';
        foreach ($productsByPage as $item) {
            $output .= '
            <tr>
                <td>'.$item['ID'].'</td>
                <td>'.$item['ProductName'].'</td>
                <td>'.$item['IDCate'].'</td>
                <td>'.number_format($item['Price'], 0, '', ',').'</td>
                <td>'.$item['Quantity'].'</td>
                <td>'.$item['Discount'].'</td>
                <td>'.$item['CreatedDay'].'</td>
                <td>'.$item['Status'].'</td>
                <td>
                    <button class="btn btn-secondary" title="View"><i class="far fa-eye"></i></button>
                    <button
                        class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        title="Edit"
                        onclick="passDataEdit(
                            '.$item['ID'].',
                            \''.$item['ProductName'].'\',
                            '.$item['IDCate'].',
                            '.$item['Price'].',
                            '.$item['Quantity'].',
                            '.$item['Discount'].'
                        );">
                            <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal" title="Remove"><i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            ';
        }
        echo $output;
    }
    public function editItem(){
        if (json_decode($this->product->editProduct($_POST['productID'],$_POST['productName'],$_POST['idCate'],$_POST['price'],$_POST['quantity'],$_POST['discount']),true)){
            echo true;
        }
        echo false;
    }
}
?>