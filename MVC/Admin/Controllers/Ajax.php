<?php
class Ajax extends ViewModel
{
    protected $accounts;
    protected $products;
    protected $orders;
    public function __construct()
    {
        if (empty($_SESSION['USER_SESSION']) || !$_SESSION['USER_TYPE_SESSION']) {
            header('Location:' . BASE_URL . 'Login/Index');
        }
        $this->accounts = $this->getModel('AccountsDAL');
        $this->products = $this->getModel('ProductsDAL');
        $this->orders = $this->getModel('OrdersDAL');
    }
    public function dataViewOrder()
    {
        $orderdetails = $this->getModel('OrderDetailsDAL');

        $orderByID = json_decode($this->orders->getOrderByID($_POST['orderID']), true);
        $listOrderdByOrderID = json_decode($orderdetails->getOrderDetailByOrderID($_POST['orderID']), true);
        $button = $orderByID['Status'] ?
            '
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="switchStatus(' . $_POST['orderID'] . ');">Chuyển sang chờ xử lý</button>
        ' :
            '
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="switchStatus(' . $_POST['orderID'] . ');">Chuyển sang đã nhận</button>
        ';
        $output = '
        <div class="content">
            <div class="order-wrapper">
                <div class="infor">
                    <div class="infor-item">
                        <label style="font-weight:bold">(MSSV):</label>
                        <label>' . $orderByID['MSSV'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Khoa:</label>
                        <label>' . $orderByID['Khoa'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Tên:</label>
                        <label>' . $orderByID['CustomerName'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Email:</label>
                        <label>' . $orderByID['CustomerEmail'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Address:</label>
                        <label>' . $orderByID['CustomerAddress'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Phone:</label>
                        <label>' . $orderByID['CustomerPhone'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Nơi nhận hàng:</label>
                        <label style="font-weight:bold;">' . $orderByID['Place'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Địa chỉ đính kèm:</label>
                        <label style="font-weight:bold;">' . $orderByID['Address'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Đặt hàng ngày:</label>
                        <label>' . $orderByID['CreatedDay'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold">Sản phẩm đã đặt:</label>
                    </div>
                    <div style="width:100%;height:1px;background-color:black;margin-bottom:10px"></div>
        ';
        foreach ($listOrderdByOrderID as $item) {
            $productName = json_decode($this->products->getProductNameByID($item['ProductID']), true);
            $output .= '
                <label style="font-weight:bold;">[ ' . $productName . ' ]</label>
            ';
        }
        $output .= '    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            ' . $button . '
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
        </div>
        ';
        echo $output;
    }
    public function switchStatus()
    {
        echo json_decode($this->orders->switchStatus($_POST['ID']));
    }


    public function checkNameAdmin()
    {
        if (json_decode($this->accounts->checkExist($_POST['inputName']))) {
            echo '<label style="color:red;margin:0;font-style:italic;">This name is already existed!</label>';
        }
    }
    public function accountData()
    {
        $listAccount = json_decode($this->accounts->getListAccount(), true);
        $data = [];
        foreach ($listAccount as $item) {
            $data[] = (object)array(
                'ID' => $item['ID'],
                'UserName' => $item['UserName'],
                'Name' => $item['Name'],
                'Email' => $item['Email'],
                'Phone' => $item['Phone'],
                'Created' => $item['CreatedDay'],
                'Type' => $item['Type'] ? '<label style="color:red;font-weight:bold;">Admin</label>' : '<label>User</label>',
                'Status' => $item['Status'] ? '<label style="color:green;font-weight:bold;">Activated</label>' : '<label style="color:red;font-weight:bold;">Locked</label>',
                'Action' => '
                    <button
                        data-toggle="modal"
                        data-target="#editModal"
                        class="btn btn-success mb-1"
                        title="Sửa"
                        onclick="passDataEditAccount(' . $item['ID'] . ', \'' . $item['Name'] . '\', \'' . $item['Email'] . '\', \'' . $item['Phone'] . '\', \'' . $item['Address'] . '\', ' . $item['Type'] . ', ' . $item['Status'] . ');"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                    <button
                        data-toggle="modal"
                        data-target="#removeModal"
                        class="btn btn-danger mb-1"
                        title="Xóa"
                        onclick="passDataRemove(' . $item['ID'] . ',\'' . $item['UserName'] . '\');"
                    >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <button
                        data-toggle="modal"
                        data-target="#resetPassModal"
                        class="btn btn-warning mb-1"
                        title="Đổi mật khẩu"
                        onclick="passDataReset(' . $item['ID'] . ');"
                    >
                        <i class="fas fa-key"></i>
                    </button>
                '
            );
        }
        $result = (object)array('data' => $data);
        echo json_encode($result);
    }
    public function insertUser()
    {
        $userName = $_POST['addName'];
        $passWord = password_hash($_POST['addPass'], PASSWORD_DEFAULT);
        $isAdmin = $_POST['isAdmin'];
        echo json_decode($this->accounts->insertAccount($userName, $passWord, $isAdmin));
    }
    public function editUser()
    {
        echo json_decode($this->accounts->updateAccount($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['isAdmin'], $_POST['status']), true);
    }
    public function resetPass()
    {
        $newPass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);
        echo json_decode($this->accounts->resetPassword($_POST['id'], $newPass));
    }


    public function productData()
    {
        $productCategories = $this->getModel('ProductCategoriesDAL');

        $listProduct = json_decode($this->products->getAllProduct(), true);
        $data = [];
        foreach ($listProduct as $item) {
            $cateName = json_decode($productCategories->getCateNameByID($item['IDCate']), true);
            $data[] = (object)array(
                'ID' => $item['ID'],
                'ProductName' => $item['ProductName'],
                'Category' => $cateName,
                'Quantity' => $item['Quantity'] > 0 ? '<label>' . $item['Quantity'] . '</label>' : '<label style="color:red;font-weight:bold;">' . $item['Quantity'] . '</label>',
                'Created' => $item['CreatedDay'],
                'Status' => $item['Status'] ? '<label style="color:green;font-weight:bold;">Activated</label>' : '<label style="color:red;font-weight:bold;">Locked</label>',
                'Action' => '
                    <button
                        data-toggle="modal"
                        data-target="#editModal"
                        class="btn btn-success mb-1"
                        title="Sửa"
                        onclick="passDataEditProduct(' . $item['ID'] . ',\'' . $item['ProductName'] . '\',\'' . $cateName . '\', ' . $item['Quantity'] . ', ' . $item['Status'] . ');"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                    <button
                        data-toggle="modal"
                        data-target="#removeModal"
                        class="btn btn-danger mb-1"
                        title="Xóa"
                        onclick="passDataRemove(' . $item['ID'] . ',\'' . $item['ProductName'] . '\');"
                    >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                '
            );
        }
        $result = (object)array('data' => $data);
        echo json_encode($result);
    }
    public function addProduct()
    {
        $productCategories = $this->getModel('ProductCategoriesDAL');

        $cateID = json_decode($productCategories->getCateIDByName($_POST['cate']), true);
        echo json_decode($this->products->insertProduct($_POST['name'], $cateID, $_POST['quantity']));
    }
    public function editProduct()
    {
        $productCategories = $this->getModel('ProductCategoriesDAL');

        $cateID = json_decode($productCategories->getCateIDByName($_POST['productCate']), true);
        echo json_decode($this->products->editProduct($_POST['id'], $_POST['productName'], $cateID, $_POST['quantity'], $_POST['status']), true);
    }


    public function orderData()
    {
        $listOrders = json_decode($this->orders->getListOrders(), true);
        $data = [];
        foreach ($listOrders as $item) {
            $button = $item['Status'] ?
                '
                <button
                    data-toggle="modal"
                    data-target="#removeModal"
                    class="btn btn-danger mb-1"
                    title="Trả về xử lý"
                    onclick="switchStatus(' . $item['ID'] . ');"
                >
                    <i class="far fa-clock"></i>
                </button>
            ' :
                '
                <button
                    data-toggle="modal"
                    data-target="#removeModal"
                    class="btn btn-success mb-1"
                    title="Chuyển sang đã nhận"
                    onclick="switchStatus(' . $item['ID'] . ');"
                >
                    <i class="fab fa-get-pocket"></i>
                </button>
            ';
            $data[] = (object)array(
                'ID' => $item['ID'],
                'MSSV' => $item['MSSV'],
                'Tên' => $item['CustomerName'],
                'Điện thoại' => $item['CustomerPhone'],
                'Nơi nhận' => $item['Place'],
                'Vị trí' => $item['Address'],
                'Ngày tạo' => $item['CreatedDay'],
                'Status' => $item['Status'] ? '<label style="color:green;font-weight:bold;">Đã nhận</label>' : '<label style="color:red;font-weight:bold;">Chưa xử lý</label>',
                'Action' => '
                    <button
                        class="btn btn-secondary mb-1"
                        title="Xem"
                        onclick="passDataViewOrder(' . $item['ID'] . ');"
                    >
                        <i class="fas fa-eye"></i>
                    </button>
                ' . $button
            );
        }
        $result = (object)array('data' => $data);
        echo json_encode($result);
    }


    public function removeItem()
    {
        // 0 is users, 1 is products
        $type = $_POST['type'];

        if ($type == 0) {
            echo json_decode($this->accounts->removeAccount($_POST['itemID']));
        } else if ($type == 1) {
            echo json_decode($this->products->removeProduct($_POST['itemID']));
        }
    }
}
