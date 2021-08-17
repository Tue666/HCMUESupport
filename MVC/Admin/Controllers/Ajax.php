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
        $button = '';
        if ($orderByID['Status'] == 0) {
            $button = '
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="switchStatus(' . $orderByID['ID'] . ');">Chuyển sang soạn hàng</button>
        ';
        } else if ($orderByID['Status'] == 1) {
            $button = '
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="switchStatus(' . $orderByID['ID'] . ');">Chuyển sang đã nhận</button>
        ';
        }
        $address = $orderByID['Address'] ? $orderByID['Address'] : '---------';
        $note = $orderByID['Note'] ? $orderByID['Note'] : '---------';
        $receivedDay = $orderByID['ReceivedDay'] ? $orderByID['ReceivedDay'] : '---------';
        $output = '
        <div class="content">
            <div class="order-wrapper">
                <div class="infor">
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Mã hóa đơn:</label>
                        <label style="width:77%;">' . $orderByID['ID'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Mã số:</label>
                        <label style="width:77%;">' . $orderByID['MSSV'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Đối tượng:</label>
                        <label style="width:77%;">' . $orderByID['Object'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Khoa:</label>
                        <label style="width:77%;">' . $orderByID['Khoa'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Tên:</label>
                        <label style="width:77%;">' . $orderByID['CustomerName'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Email:</label>
                        <label style="width:77%;">' . $orderByID['CustomerEmail'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Địa chỉ:</label>
                        <label style="width:77%;">' . $orderByID['CustomerAddress'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Số điện thoại:</label>
                        <label style="width:77%;">' . $orderByID['CustomerPhone'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Sức khỏe:</label>
                        <label style="width:77%;" style="font-weight:bold">' . $orderByID['Health'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Nơi nhận hàng:</label>
                        <label style="width:77%;" style="font-weight:bold;">' . $orderByID['Place'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Địa chỉ đính kèm:</label>
                        <label style="width:77%;" style="font-weight:bold;">' . $address . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Ghi chú:</label>
                        <label style="width:77%;" style="font-weight:bold;">' . $note . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Đặt hàng ngày:</label>
                        <label style="width:77%;">' . $orderByID['CreatedDay'] . '</label>
                    </div>
                    <div class="infor-item">
                        <label style="font-weight:bold;width:20%">Ngày nhận:</label>
                        <label style="width:77%;">' . $receivedDay . '</label>
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
            <button type="button" class="btn btn-primary" title="In" onclick="printArea();"><i class="fas fa-print"></i></button>
            ' . $button . '
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
        </div>
        ';
        echo $output;
    }
    public function switchStatus()
    {
        $type = $_POST['type'];
        if ($type == 0) {
            $orderByID = json_decode($this->orders->getOrderByID($_POST['ID']), true);
            echo json_decode($this->orders->updateStatus($orderByID['ID'], $orderByID['Status'] + 1));
        }
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
                'MSSV' => $item['UserName'],
                'Họ tên' => $item['Name'],
                'Email' => $item['Email'],
                'Điện thoại' => $item['Phone'],
                'Loại' => $item['Type'] ? '<label style="color:red;font-weight:bold;">Quản lý</label>' : '<label>Người dùng</label>',
                'Trạng thái' => $item['Status'] ? '<label style="color:green;font-weight:bold;">Sử dụng</label>' : '<label style="color:red;font-weight:bold;">Khóa</label>',
                'Hành động' => '
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
            $image = $item['Image'] ? $item['Image'] : 'image_not_found.png';
            $cateName = json_decode($productCategories->getCateNameByID($item['IDCate']), true);
            $data[] = (object)array(
                'ID' => $item['ID'],
                'Tên' => $item['ProductName'],
                'Hình' => '<img style="width:50px;height:50px;background-size:100% auto;" src="' . IMAGE_URL . '/' . $image . '" />',
                'Loại' => $cateName,
                'Mô tả' => $item['Description'],
                'Số lượng' => $item['Quantity'] > 0 ? '<label>' . $item['Quantity'] . '</label>' : '<label style="color:red;font-weight:bold;">' . $item['Quantity'] . '</label>',
                'Ngày tạo' => $item['CreatedDay'],
                'Trạng thái' => $item['Status'] ? '<label style="color:green;font-weight:bold;">Sử dụng</label>' : '<label style="color:red;font-weight:bold;">Khóa</label>',
                'Hành động' => '
                    <button
                        data-toggle="modal"
                        data-target="#editModal"
                        class="btn btn-success mb-1"
                        title="Sửa"
                        onclick="passDataEditProduct(
                            ' . $item['ID'] . ',
                            \'' . $item['ProductName'] . '\',
                            \'' . $cateName . '\',
                            ' . $item['Quantity'] . ',
                            \'' . IMAGE_URL . '/' . $item['Image'] . '\',
                            \'' . $item['Description'] . '\',
                            ' . $item['Status'] . '
                        );"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                    <button
                        class="btn btn-danger mb-1 disabled"
                        title="Xóa"
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

        $image = "image_not_found.png";
        if (isset($_FILES['file']['name'])) {
            $fileName = $_FILES['file']['name'];
            $fileExt = explode('.', $fileName);
            $imageFileType = strtolower(end($fileExt));

            $allowed = array("jpg", "jpeg", "png");

            if (in_array($imageFileType, $allowed)) {
                $location = 'Public/images/' . $fileName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                    $image = $fileName;
                }
            }
        }
        $cateID = json_decode($productCategories->getCateIDByName($_POST['inputCate']), true);
        echo json_decode($this->products->insertProduct($_POST['inputName'], $cateID, $image, $_POST['inputQuantity'], $_POST['inputDescription']));
    }
    public function editProduct()
    {
        $productCategories = $this->getModel('ProductCategoriesDAL');

        $linkImage = $_POST['image'];
        if (isset($_FILES['file']['name'])) {
            $linkImage = $_FILES['file']['name'];
            $fileExt = explode('.', $linkImage);
            $imageFileType = strtolower(end($fileExt));

            $allowed = array("jpg", "jpeg", "png");

            if (in_array($imageFileType, $allowed)) {
                $location = 'Public/images/' . $linkImage;
                move_uploaded_file($_FILES['file']['tmp_name'], $location);
            }
        }
        $linkImage = explode('/', $linkImage);
        $image = end($linkImage);

        $cateID = json_decode($productCategories->getCateIDByName($_POST['productCate']), true);
        echo json_decode($this->products->editProduct($_POST['id'], $_POST['productName'], $cateID, $_POST['quantity'], $image, $_POST['description'], $_POST['status']), true);
    }


    public function orderData()
    {
        $listOrders = json_decode($this->orders->getListOrders(), true);
        $data = [];
        foreach ($listOrders as $item) {
            $button = '';
            if ($item['Status'] == 0) {
                $button = '
                    <button
                        class="btn btn-danger mb-1"
                        title="Chuyển sang soạn hàng"
                        onclick="switchStatus(' . $item['ID'] . ');"
                    >
                        <i class="fas fa-gifts"></i>
                    </button>
                ';
            } else if ($item['Status'] == 1) {
                $button = '
                    <button
                        class="btn btn-success mb-1"
                        title="Chuyển sang đã nhận"
                        onclick="switchStatus(' . $item['ID'] . ');"
                    >
                        <i class="fas fa-check-double"></i>
                    </button>
                    ';
            }
            $status = '';
            if ($item['Status'] == 0) {
                $status = '<label style="color:red;font-weight:bold;">Đang xử lý</label>';
            } else if ($item['Status'] == 1) {
                $status = '<label style="color:red;font-weight:bold;">Đang soạn hàng</label>';
            } else if ($item['Status'] == 2) {
                $status = '<label style="color:green;font-weight:bold;">Đã nhận</label>';
            }
            $data[] = (object)array(
                'ID' => $item['ID'],
                'Mã' => $item['MSSV'],
                'Tên' => $item['CustomerName'],
                'Điện thoại' => $item['CustomerPhone'],
                'Nơi nhận' => $item['Place'],
                'Vị trí' => $item['Address'],
                'Ngày tạo' => $item['CreatedDay'],
                'Ngày nhận' => $item['ReceivedDay'] ? $item['ReceivedDay'] : '
                    <button
                        class="btn btn-primary mb-1"
                        title="Cập nhật ngày nhận"
                        onclick="passDataReceivedDay(' . $item['ID'] . ')"
                    >
                        <i class="far fa-calendar-plus"></i>
                    </button>
                ',
                'Trạng thái' => $status,
                'Hành động' => '
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
    public function updateReceivedDay()
    {
        $receivedDay = $_POST['date'];
        $createdDay = json_decode($this->orders->getCreatedDay($_POST['orderID']), true);
        $today = date("Y-m-d");
        if ($receivedDay < $createdDay || $receivedDay == "") {
            $receivedDay = $today;
        }
        echo json_decode($this->orders->updateReceivedDay($_POST['orderID'], $receivedDay));
    }


    public function removeItem()
    {
        $carts = $this->getModel('CartsDAL');
        $stored = $this->getModel('StoreDAL');

        // 0 is users, 1 is products
        $type = $_POST['type'];

        if ($type == 0) {
            $listCartByUser = json_decode($carts->getCartsByUserID($_POST['itemID']), true);
            foreach ($listCartByUser as $item) {
                if (json_decode($carts->removeItem($_POST['itemID'], $item['ProductID']), true)) {
                    json_decode($this->products->updateQuantity($item['ProductID'], 1));
                }
            }
            json_decode($stored->clearStored($_POST['itemID']));
            echo json_decode($this->accounts->removeAccount($_POST['itemID']));
        } else if ($type == 1) {
            echo json_decode($this->products->removeProduct($_POST['itemID']));
        }
    }
}
