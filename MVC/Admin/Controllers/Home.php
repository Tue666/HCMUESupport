<?php
class Home extends ViewModel
{
	protected $accounts;
	protected $products;
	protected $orders;
	public function __construct()
	{
		if (empty($_SESSION['USER_SESSION']) || !$_SESSION['USER_TYPE_SESSION']) {
			header('Location:' . BASE_URL . 'Login/Index');
		} else {
			$this->accounts = $this->getModel('AccountsDAL');
			$this->products = $this->getModel('ProductsDAL');
			$this->orders = $this->getModel('OrdersDAL');

			// Unlock order per proruct after 3 days
			// $stored = $this->getModel('StoreDAL');

			// $listStored = json_decode($stored->getAllStored(), true);
			// foreach ($listStored as $item) {
			// 	if ($item['StoreDay'] != "") {
			// 		$dayFrom = strtotime($item['StoreDay']);
			// 		$dayTo = strtotime(date("Y-m-d"));
			// 		$datediff = $dayTo - $dayFrom;
			// 		if (3 - (round($datediff / (60 * 60 * 24))) == 0) {
			// 			json_decode($stored->removeItem($item['UserID'], $item['ProductID']));
			// 		}
			// 	}
			// }
		}
	}
	public function Index()
	{
		$totalAdmin = json_decode($this->accounts->countAccount(1), true);
		$totalUser = json_decode($this->accounts->countAccount(0), true);
		$totalProduct = json_decode($this->products->countProduct(), true);
		$totalSuccessOrder = json_decode($this->orders->countOrder(1), true);
		$totalProcessOrder = json_decode($this->orders->countOrder(0), true);
		$this->loadView('Shared', 'Layout', [
			'title' => 'Dashboard',
			'page' => 'Home/Index',
			'totalAdmin' => $totalAdmin,
			'totalUser' => $totalUser,
			'totalProduct' => $totalProduct,
			'totalSuccessOrder' => $totalSuccessOrder,
			'totalProcessOrder' => $totalProcessOrder
		], 1);
	}
}
