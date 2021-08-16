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
		$listCategories = json_decode($this->productcategories->getCategories(), true);
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
			'listCarts' => $listCarts
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
