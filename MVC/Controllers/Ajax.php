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
		$stored = $this->getModel('StoreDAL');

		$listCarts = json_decode($carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
		if (count($listCarts) > 0) {
			$today = date("Y-m-d");
			$orderID = json_decode($orders->insertOrder($_SESSION['USER_ID_SESSION'], $_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['mssv'], $_POST['khoa'], $_POST['method'], $_POST['method_address'], $_POST['method_note']), true);
			if ($orderID > 0) {
				foreach ($listCarts as $item) {
					json_decode($orderdetails->insertOrderDetail($orderID, $item['ProductID']), true);
				}
				json_decode($carts->clearCarts($_SESSION['USER_ID_SESSION']), true);
				json_decode($stored->clearStored($_SESSION['USER_ID_SESSION']), true);
				echo true;
			} else echo false;
		} else echo false;
	}
	public function loadCart()
	{
		$carts = $this->getModel('CartsDAL');
		$products = $this->getModel('ProductsDAL');

		$listCarts = json_decode($carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
		$output = '';
		if (count($listCarts) > 0) {
			foreach ($listCarts as $item) {
				$product = json_decode($products->getProductByID($item['ProductID']), true);
				$output .= '
				<div class="item">
					<label class="item-name" title="' . $product['ProductName'] . '">' . $product['ProductName'] . '</label>
					<i class="far fa-trash-alt item-remove" onclick="passDataRemove(' . $item['ProductID'] . ',\'' . $product['ProductName'] . '\')"></i>
				</div>
				';
			}
		} else {
			$output .= '
				<div style="display:flex;flex-direction:column;justify-content:center;align-items:center;height:100%;text-align:center;">
					<label style="color:red;font-weight:bold;">Không có sản phẩm nào trong giỏ!</label>
					<label style="color:red;font-weight:bold;">NOTE: Không thể tiến hành đặt hàng nếu giỏ hàng rỗng!</label>
				</div>
			';
		}
		echo $output;
	}
	public function addCart()
	{
		// 1 return success, 2 return out quantity, 3 return not enough time to order
		$carts = $this->getModel('CartsDAL');
		$products = $this->getModel('ProductsDAL');
		$orders = $this->getModel('OrdersDAL');
		$stored = $this->getModel('StoreDAL');

		// Check if not enough time to order
		$beBought = false;
		$lastOrdered = json_decode($orders->getLastOrdered($_SESSION['USER_ID_SESSION']), true);
		$today = strtotime(date("Y-m-d"));
		$dayFrom = strtotime($lastOrdered['CreatedDay']);
		$datediff = $today - $dayFrom;
		if ((3 - (round($datediff / (60 * 60 * 24)))) < 1) $beBought = true;

		// Check if added to cart
		$store = array();
		$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']), true);
		foreach ($listStored as $item) {
			array_push($store, $item['ProductID']);
		}

		if (!in_array($_POST['productID'], $store)) {
			$product = json_decode($products->getProductByID($_POST['productID']), true);
			if ($product['Quantity'] < 1) {
				echo 2;
			} else if (!$beBought) {
				echo 3;
			} else {
				json_decode($carts->insertCart($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
				json_decode($stored->insertStore($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
				json_decode($products->updateQuantity($_POST['productID'], -1), true);
				echo 1;
			}
		}
	}
	// public function addCart()
	// {
	// 	// 1 return success, 2 return out quantity, 3 return failed
	// 	$carts = $this->getModel('CartsDAL');
	// 	$stored = $this->getModel('StoreDAL');
	// 	$products = $this->getModel('ProductsDAL');

	// 	$store = array();
	// 	$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']), true);
	// 	foreach ($listStored as $item) {
	// 		array_push($store, $item['ProductID']);
	// 	}
	// 	if (!in_array($_POST['productID'], $store)) {
	// 		$product = json_decode($products->getProductByID($_POST['productID']), true);
	// 		if ($product['Quantity'] < 1) {
	// 			echo 2;
	// 		} else {
	// 			json_decode($carts->insertCart($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
	// 			json_decode($stored->insertStore($_SESSION['USER_ID_SESSION'], $_POST['productID']), true);
	// 			json_decode($products->updateQuantity($_POST['productID'], -1), true);
	// 			echo 1;
	// 		}
	// 	}
	// }
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
		$orders = $this->getModel('OrdersDAL');
		$stored = $this->getModel('StoreDAL');

		// Get list products
		$listProductsJSON = [];
		if ($keyWord == "" && $category == "Tất cả" && $status == "Tất cả") {
			$listProductsJSON = json_decode($products->getProduct(), true);
		} else {
			if ($category != 'Tất cả') {
				$category = json_decode($productcategories->getCateIDByName($_POST['category']), true);
			}
			$listProductsJSON = json_decode($products->getProductAdvanced($keyWord, $category, $status), true);
		}
		$listProducts = array();
		foreach ($listProductsJSON as $item) {
			$cateJSON = json_decode($productcategories->getCategoryByID($item['IDCate']), true);
			array_push($listProducts, [
				'ID' => $item['ID'],
				'ProductName' => $item['ProductName'],
				'CateName' => $cateJSON['CateName'],
				'Quantity' => $item['Quantity'],
				'Image' => $item['Image'],
				'Description' => $item['Description']
			]);
		}

		// Check if added to cart
		$store = array();
		if (!empty($_SESSION['USER_SESSION'])) {
			$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']), true);
			foreach ($listStored as $item) {
				array_push($store, $item['ProductID']);
			}
		}

		// Check if not enough time to order
		$beBought = false;
		$timeRemain = 0;
		if (!empty($_SESSION['USER_SESSION'])) {
			$lastOrdered = json_decode($orders->getLastOrdered($_SESSION['USER_ID_SESSION']), true);
			$today = strtotime(date("Y-m-d"));
			$dayFrom = strtotime($lastOrdered['CreatedDay']);
			$datediff = $today - $dayFrom;
			$timeRemain = (3 - (round($datediff / (60 * 60 * 24))));
			if ($timeRemain < 1) $beBought = true;
		}

		$output = '';
		if (count($listProducts) < 1) {
			$output .= '<label>Không có sản phẩm nào hehe</label>';
		} else {
			foreach ($listProducts as $item) {
				$image = $item['Image'] ? $item['Image'] : 'image_not_found.png';
				$output .= '
				<div class="product-card">
					<div class="image-wrap">
						<img class="image" src="' . IMAGE_URL . '/' . $image . '" />
					</div>
					<div class="infor">
						<label title="' . $item['ProductName'] . '" class="name">' . $item['ProductName'] . '</label>
						<label class="category">Loại: ' . $item['CateName'] . '</label>
						<label class="quantity">Số lượng: ' . $item['Quantity'] . '</label>
						<label title="' . ($item['Description'] ? $item['Description'] : "Chưa có mô tả cho sản phẩm này :D")  . '" class="descrip">' . ($item['Description'] ? $item['Description'] : "Chưa có mô tả cho sản phẩm này :D") . '</label>
					</div>
					<div class="action">
				';
				if ($item['Quantity'] < 1) {
					$output .= '<label style="color:red;font-weight:bold;">Hết hàng</label>';
				} else {
					if (!empty($_SESSION['USER_SESSION'])) {
						if (in_array($item['ID'], $store)) {
							$output .= '<label style="color:red;font-weight:bold;">Đã thêm vào giỏ</label>';
						} else if (!$beBought) {
							$output .= '<label style="color:red;">Lần đặt tiếp: <label style="color:red;font-weight:bold;">' . $timeRemain . '</label> ngày</label>';
						} else $output .= '<button onclick="addCart(' . $item['ID'] . ');" class="btn btn-danger">Đặt</button>';
					} else {
						$output .= '<button onclick="addCart(' . $item['ID'] . ');" class="btn btn-danger">Đặt</button>';
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

	// public function loadProducts()
	// {
	// 	$keyWord = $_POST['keyWord'];
	// 	$category = $_POST['category'];
	// 	$status = $_POST['status'];

	// 	$products = $this->getModel('ProductsDAL');
	// 	$productcategories = $this->getModel('ProductCategoriesDAL');
	// 	$stored = $this->getModel('StoreDAL');

	// 	$listProductsJSON = [];
	// 	if ($keyWord == "" && $category == "Tất cả" && $status == "Tất cả") {
	// 		$listProductsJSON = json_decode($products->getProduct(), true);
	// 	} else {
	// 		if ($category != 'Tất cả') {
	// 			$category = json_decode($productcategories->getCateIDByName($_POST['category']), true);
	// 		}
	// 		$listProductsJSON = json_decode($products->getProductAdvanced($keyWord, $category, $status), true);
	// 	}
	// 	$listProducts = array();
	// 	$store = array();
	// 	if (!empty($_SESSION['USER_SESSION'])) {
	// 		$listStored = json_decode($stored->getStored($_SESSION['USER_ID_SESSION']), true);
	// 		foreach ($listStored as $item) {
	// 			array_push($store, $item['ProductID']);
	// 		}
	// 	}
	// 	foreach ($listProductsJSON as $item) {
	// 		$cateJSON = json_decode($productcategories->getCategoryByID($item['IDCate']), true);
	// 		array_push($listProducts, [
	// 			'ID' => $item['ID'],
	// 			'ProductName' => $item['ProductName'],
	// 			'CateName' => $cateJSON['CateName'],
	// 			'Quantity' => $item['Quantity']
	// 		]);
	// 	}

	// 	$output = '';
	// 	if (count($listProducts) < 1) {
	// 		$output .= '<label>Không có sản phẩm nào hehe</label>';
	// 	} else {
	// 		foreach ($listProducts as $item) {
	// 			$output .= '
	// 			<div class="product-card">
	// 				<div class="infor">
	// 					<label title="' . $item['ProductName'] . '" class="name">' . $item['ProductName'] . '</label>
	// 					<label class="category">Loại: ' . $item['CateName'] . '</label>
	// 					<label class="quantity">Số lượng: ' . $item['Quantity'] . '</label>
	// 				</div>
	// 				<div class="action">
	// 			';
	// 			if ($item['Quantity'] < 1) {
	// 				$output .= '<label style="color:red">Hết hàng</label>';
	// 			} else {
	// 				if (!empty($_SESSION['USER_SESSION'])) {
	// 					if (in_array($item['ID'], $store)) {
	// 						$storeDay = json_decode($stored->getStoreDay($_SESSION['USER_ID_SESSION'], $item['ID']), true);
	// 						if ($storeDay != "") {
	// 							$dayTo = strtotime(date("Y-m-d"));
	// 							$dayFrom = strtotime($storeDay);
	// 							$datediff = $dayTo - $dayFrom;
	// 							$output .= '<label style="color:red">Lần đặt tiếp: ' . (3 - (round($datediff / (60 * 60 * 24)))) . ' ngày</label>';
	// 						} else {
	// 							$output .= '<label style="color:red">Đã thêm vào giỏ</label>';
	// 						}
	// 					} else {
	// 						$output .= '<button onclick="addCart(' . $item['ID'] . ');" class="btn btn-danger">Đặt</button>';
	// 					}
	// 				} else{
	// 					$output .= '<button onclick="addCart(' . $item['ID'] . ');" class="btn btn-danger">Đặt</button>';
	// 				}
	// 			}
	// 			$output .= '		
	// 				</div>
	// 			</div>
	// 			';
	// 		}
	// 	}
	// 	echo $output;
	// }
}
