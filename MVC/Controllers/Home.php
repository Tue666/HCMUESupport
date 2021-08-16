<?php
class Home extends ViewModel
{
	protected $productcategories;
	protected $orders;
	protected $carts;
	protected $products;
	function __construct()
	{
		$this->productcategories = $this->getModel('ProductCategoriesDAL');
		$this->orders = $this->getModel('OrdersDAL');
		$this->carts = $this->getModel('CartsDAL');
		$this->products = $this->getModel('ProductsDAL');
	}
	public function Index()
	{
		// list products
		$orders = $this->getModel('OrdersDAL');
		$stored = $this->getModel('StoreDAL');

		$listProductsJSON = json_decode($this->products->getProduct(), true);
		$listProducts = array();
		foreach ($listProductsJSON as $item) {
			$cateJSON = json_decode($this->productcategories->getCategoryByID($item['IDCate']), true);
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
		$beBought = true;
		$timeRemain = 0;
		if (!empty($_SESSION['USER_SESSION'])) {
			$lastOrdered = json_decode($orders->getLastOrdered($_SESSION['USER_ID_SESSION']), true);
			if (!empty($lastOrdered)) {
				$beBought = false;
				$today = strtotime(date("Y-m-d"));
				$dayFrom = strtotime($lastOrdered['CreatedDay']);
				$datediff = $today - $dayFrom;
				$timeRemain = (3 - (round($datediff / (60 * 60 * 24))));
				if ($timeRemain < 1) $beBought = true;
			}
		}

		// list categories
		$listCategories = json_decode($this->productcategories->getCategories(), true);

		// list cart
		$cartJSON = array();
		if (!empty($_SESSION['USER_SESSION'])) {
			$cartJSON = json_decode($this->carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
		}
		$listCarts = array();
		foreach ($cartJSON as $item) {
			$product = json_decode($this->products->getProductByID($item['ProductID']), true);
			array_push($listCarts,[
				'ProductID' => $product['ID'],
				'Image' => $product['Image'],
				'ProductName' => $product['ProductName'],
				'Description' => $product['Description']
			]);
		}
		$this->loadView('Shared', 'Layout', [
			'title' => 'Trang chủ',
			'page' => 'Home/Index',
			'listCategories' => $listCategories,
			'listCarts' => $listCarts,
			'listProducts' => $listProducts,
			'store' => $store,
			'beBought' => $beBought,
			'timeRemain' => $timeRemain
		]);
	}
	public function History($page = 1)
	{
		if (empty($_SESSION['USER_SESSION'])) {
			header('Location:' . BASE_URL . 'Login/Index');
		} else {
			// Datatable Bootstrap
			$ordersByUser = json_decode($this->orders->getOrderByUserID($_SESSION['USER_ID_SESSION']), true);
			$this->loadView('Shared', 'Layout', [
				'title' => 'Lịch sử đặt',
				'page' => 'Home/History',
				'ordersByUser' => $ordersByUser
			]);
		}
	}
	public function Ordered($orderID)
	{
		if (empty($_SESSION['USER_SESSION']) || !$_SESSION['USER_STATUS_SESSION']) {
			header('Location:' . BASE_URL . 'Login/Index');
		}
		$products = $this->getModel('ProductsDAL');
		$orderdetails = $this->getModel('OrderDetailsDAL');

		$listOrderDetail = json_decode($orderdetails->getOrderDetailByOrderID($orderID), true);
		$orderByID = json_decode($this->orders->getOrderByID($orderID), true);
		$listOrdered = array();
		foreach ($listOrderDetail as $item) {
			$product = json_decode($products->getProductByID($item['ProductID']), true);
			array_push($listOrdered, [
				'ProductName' => $product['ProductName'],
				'Image' => $product['Image'],
				'Description' => $product['Description']
			]);
		}
		$this->loadView('Shared', 'Layout', [
			'title' => 'Hóa đơn',
			'page' => 'Home/Ordered',
			'orderByID' => $orderByID,
			'listOrdered' => $listOrdered
		]);
	}
	public function Success()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Thành công',
			'page' => 'Shared/Success'
		]);
	}
	public function Failed()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Thất bại',
			'page' => 'Shared/Fail'
		]);
	}
}
