<?php
class Home extends ViewModel
{
	protected $productcategories;
	protected $orders;
	function __construct()
	{
		$this->productcategories = $this->getModel('ProductCategoriesDAL');
		$this->orders = $this->getModel('OrdersDAL');
	}
	public function Index()
	{
		$listCategories = json_decode($this->productcategories->getCategories(), true);
		$this->loadView('Shared', 'Layout', [
			'title' => 'Home',
			'page' => 'Home/Index',
			'listCategories' => $listCategories
		]);
	}
	public function History($page = 1)
	{
		if (empty($_SESSION['USER_SESSION'])) {
			header('Location:' . BASE_URL . 'Login/Index');
		} else {
			$pageSize = 7;
			$totalItem = json_decode($this->orders->countTotalRecords($_SESSION['USER_ID_SESSION']), true);
			$totalPage = ceil($totalItem / $pageSize);
			$maxPage = 10;
			$nextPage = $page + 1;
			$prevPage = $page - 1;
			$ordersByPage = json_decode($this->orders->getOrdersByPage($_SESSION['USER_ID_SESSION'], $page, $pageSize), true);

			$this->loadView('Shared', 'Layout', [
				'title' => 'History',
				'page' => 'Home/History',
				'ordersByPage' => $ordersByPage,
				'totalItem' => $totalItem,
				'totalPage' => $totalPage,
				'maxPage' => $maxPage,
				'nextPage' => $nextPage,
				'prevPage' => $prevPage,
				'currentPage' => $page
			]);
		}
	}
	public function Ordered($orderID){
		$products = $this->getModel('ProductsDAL');
		$orderdetails = $this->getModel('OrderDetailsDAL');

		$listOrderDetail = json_decode($orderdetails->getOrderDetailByOrderID($orderID),true);
		$orderByID = json_decode($this->orders->getOrderByID($orderID),true);
		$listOrdered = array();
		foreach ($listOrderDetail as $item) {
			$productName = json_decode($products->getProductNameByID($item['ProductID']),true);
			array_push($listOrdered,$productName);
		}
		$this->loadView('Shared', 'Layout', [
			'title' => 'Orderd',
			'page' => 'Home/Ordered',
			'orderByID'=>$orderByID,
			'listOrdered'=>$listOrdered
		]);
	}
	public function Success()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Success',
			'page' => 'Shared/Success'
		]);
	}
	public function Failed()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Failed',
			'page' => 'Shared/Fail'
		]);
	}
}
