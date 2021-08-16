<?php
class Order extends ViewModel
{
    public function __construct()
    {
        if (empty($_SESSION['USER_SESSION']) || !$_SESSION['USER_STATUS_SESSION']) {
            header('Location:' . BASE_URL . 'Login/Index');
        }
    }
    public function Index()
    {
        $accounts = $this->getModel('AccountsDAL');
        $account = json_decode($accounts->getAccountByID($_SESSION['USER_ID_SESSION']), true);
        $carts = $this->getModel('CartsDAL');
		$products = $this->getModel('ProductsDAL');

        $cartJSON = array();
		if (!empty($_SESSION['USER_SESSION'])) {
			$cartJSON = json_decode($carts->getCartsByUserID($_SESSION['USER_ID_SESSION']), true);
		}
        $listCarts = array();
		foreach ($cartJSON as $item) {
			$product = json_decode($products->getProductByID($item['ProductID']), true);
			array_push($listCarts,[
				'ProductID' => $product['ID'],
				'Image' => $product['Image'],
				'ProductName' => $product['ProductName'],
				'Description' => $product['Description']
			]);
		}
        $this->loadView('Shared', 'Layout', [
            'title' => 'Đặt hàng',
            'page' => 'Order/Index',
            'account' => $account,
            'listCarts' => $listCarts
        ]);
    }
}
