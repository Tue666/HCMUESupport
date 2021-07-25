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
				<div class="number"><label>'.count($listCarts).'</label></div>
				<div class="show-cart">
			';
			foreach ($listCarts as $item) {
				$product = json_decode($products->getProductByID($item['ProductID']),true);
				$output .= '
					<div class="cart-item">
						<label title="'.$product['ProductName'].'" class="name">'.$product['ProductName'].'</label>
					</div>
				';
			}
				$output .= '
				</div>
				';
		}
		echo $output;
	}
	public function addCart()
	{
		$carts = $this->getModel('CartsDAL');
		$stored = $this->getModel('StoreDAL');

		$store = array();
		$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']),true);
		foreach ($listStored as $item) {
			array_push($store,$item['ID']);
		}
		if (!in_array($_POST['productID'],$store)) {
			json_decode($carts->insertCart($_SESSION['USER_ID_SESSION'],$_POST['productID']),true);
			json_decode($stored->insertStore($_SESSION['USER_ID_SESSION'],$_POST['productID']),true);
			echo true;
		}
		echo false;
	}

	public function loadProducts()
	{
		$products = $this->getModel('ProductsDAL');
		$productcategories = $this->getModel('ProductCategoriesDAL');
		$stored = $this->getModel('StoreDAL');

		$listProductsJSON = json_decode($products->getProduct(), true);
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
			if (empty($_SESSION['USER_SESSION']) || !in_array($item['ID'], $store)) {
				$output .= '
					<button onclick="addCart(' . $item['ID'] . ');" class="btn btn-danger">Đặt</button>
				';
			} else {
				$output .= '
				<label style="color:red">Hết lượt đặt tuần này :D</label>
			';
			}
			$output .= '		
				</div>
			</div>
			';
		}
		echo $output;
	}
}
