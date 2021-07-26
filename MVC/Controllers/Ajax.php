<?php
class Ajax extends ViewModel
{
	public function CheckSession()
	{
		echo !empty($_SESSION['USER_SESSION']);
	}
	public function checkExistUSName()
	{
		$accounts = $this->getModel('AccountsDAL');
		$userName = $_POST['userName'];
		if (json_decode($accounts->checkExist($userName))) {
			echo "Tên tài khoản này đã tồn tại :D";
		}
	}
	public function addOrder()
	{
		$orders = $this->getModel('OrdersDAL');
		$orderdetails = $this->getModel('OrderDetailsDAL');
		$carts = $this->getModel('CartsDAL');

		$orderID = json_decode($orders->insertOrder($_SESSION['USER_ID_SESSION'],$_POST['name'],$_POST['email'],$_POST['address'],$_POST['phone'],$_POST['mssv'],$_POST['khoa'],$_POST['method'],$_POST['method_address'],$_POST['method_note']),true);
		if ($orderID > 0){
			$listCarts = json_decode($carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
			foreach ($listCarts as $item) {
				json_decode($orderdetails->insertOrderDetail($orderID,$item['ProductID']),true);
			}
			json_decode($carts->clearCarts($_SESSION['USER_ID_SESSION']),true);
			echo true;
		}
		else echo false;
	}
	public function loadCart()
	{
		$carts = $this->getModel('CartsDAL');
		$products = $this->getModel('ProductsDAL');

		$listCarts = json_decode($carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
		$output = '';
		foreach ($listCarts as $item) {
			$product = json_decode($products->getProductByID($item['ProductID']), true);
			$output .= '
			<div class="item">
                <label class="item-name" title="' . $product['ProductName'] . '">' . $product['ProductName'] . '</label>
                <i class="far fa-trash-alt item-remove" onclick="passDataRemove(' . $item['ProductID'] . ',\'' . $product['ProductName'] . '\')"></i>
            </div>
			';
		}
		echo $output;
	}
	public function addCart()
	{
		// 1 return success, 2 return out quantity, 3 return failed
		$carts = $this->getModel('CartsDAL');
		$stored = $this->getModel('StoreDAL');
		$products = $this->getModel('ProductsDAL');

		$store = array();
		$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']), true);
		foreach ($listStored as $item) {
			array_push($store, $item['ProductID']);
		}
		if (!in_array($_POST['productID'], $store)) {
			$product = json_decode($products->getProductByID($_POST['productID']), true);
			if ($product['Quantity'] < 1) {
				echo 2;
			} else {
				json_decode($carts->insertCart($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
				json_decode($stored->insertStore($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
				json_decode($products->updateQuantity($_POST['productID'], -1), true);
				echo 1;
			}
		}
	}
	public function removeCart()
	{
		$carts = $this->getModel('CartsDAL');
		$stored = $this->getModel('StoreDAL');
		$products = $this->getModel('ProductsDAL');

		if (json_decode($carts->removeItem($_SESSION['USER_ID_SESSION'], $_POST['productID']), true)) {
			json_decode($stored->removeItem($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
			json_decode($products->updateQuantity($_POST['productID'], 1), true);
			echo true;
		}
		echo false;
	}
	public function loadCartHover()
	{
		$carts = $this->getModel('CartsDAL');
		$products = $this->getModel('ProductsDAL');

		$listCarts = json_decode($carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
		$output = '
			<i class="fas fa-shopping-cart"></i>
		';
		if (count($listCarts) < 1) {
			$output .= '
				<div class="show-cart" style="display:flex;justify-content:center;align-items:center">
					<label style="margin:0;">Chưa có sản phẩm nào</label>
				</div>
			';
		} else {
			$output .= '
				<div class="number"><label>' . count($listCarts) . '</label></div>
				<div class="show-cart">
			';
			foreach ($listCarts as $item) {
				$product = json_decode($products->getProductByID($item['ProductID']), true);
				$output .= '
					<div class="cart-item">
						<label title="' . $product['ProductName'] . '" class="name">' . $product['ProductName'] . '</label>
					</div>
				';
			}
			$output .= '
				</div>
				';
		}
		echo $output;
	}

	public function loadProducts()
	{
		$keyWord = $_POST['keyWord'];
		$category = $_POST['category'];
		$status = $_POST['status'];

		$products = $this->getModel('ProductsDAL');
		$productcategories = $this->getModel('ProductCategoriesDAL');
		$stored = $this->getModel('StoreDAL');

		$listProductsJSON = [];
		if ($keyWord == "" && $category == "Tất cả" && $status == "Tất cả") {
			$listProductsJSON = json_decode($products->getProduct(), true);
		}
		else {
			if ($category != 'Tất cả'){
				$category = json_decode($productcategories->getCateIDByName($_POST['category']),true);
			}
			$listProductsJSON = json_decode($products->getProductAdvanced($keyWord,$category,$status), true);
		}
		$listProducts = array();
		$store = array();
		if (!empty($_SESSION['USER_SESSION'])) {
			$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']), true);
			foreach ($listStored as $item) {
				array_push($store, $item['ProductID']);
			}
		}
		foreach ($listProductsJSON as $item) {
			$cateJSON = json_decode($productcategories->getCategoryByID($item['IDCate']), true);
			array_push($listProducts, [
				'ID' => $item['ID'],
				'ProductName' => $item['ProductName'],
				'CateName' => $cateJSON['CateName'],
				'Quantity' => $item['Quantity']
			]);
		}

		$output = '';
		if (count($listProducts) < 1) {
			$output .= '<label>Không có sản phẩm nào</label>';
		} else {
			foreach ($listProducts as $item) {
				$output .= '
			<div class="product-card">
				<div class="infor">
					<label title="' . $item['ProductName'] . '" class="name">' . $item['ProductName'] . '</label>
					<label class="category">Loại: ' . $item['CateName'] . '</label>
					<label class="quantity">Số lượng: ' . $item['Quantity'] . '</label>
				</div>
				<div class="action">
			';
				if ($item['Quantity'] < 1) {
					$output .= '
				<label style="color:red">Hết hàng</label>
			';
				} else {
					if (empty($_SESSION['USER_SESSION']) || !in_array($item['ID'], $store)) {
						$output .= '
					<button onclick="addCart(' . $item['ID'] . ');" class="btn btn-danger">Đặt</button>
				';
					} else {
						$output .= '
				<label style="color:red">Đã thêm vào giỏ</label>
			';
					}
				}
				$output .= '		
				</div>
			</div>
			';
			}
		}
		echo $output;
	}
}
