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
        }
    }
    public function Index()
    {
        $totalAdmin = json_decode($this->accounts->countAccount(1), true);
        $totalUser = json_decode($this->accounts->countAccount(0), true);
        $totalProduct = json_decode($this->products->countProduct(), true);
        $totalSuccessOrder = 0;
        $totalDoingOrder = 0;
        $totalProcessOrder = 0;
        $listOrder = json_decode($this->orders->getListOrders(),true);
        foreach ($listOrder as $item) {
            switch ($item['Status']) {
                case 0:
                    $totalProcessOrder = $totalProcessOrder + 1;
                    break;
                case 1:
                    $totalDoingOrder = $totalDoingOrder + 1;
                    break;
                case 2:
                    $totalSuccessOrder = $totalSuccessOrder + 1;
                    break;
            }
        }
        $this->loadView('Shared', 'Layout', [
            'title' => 'Quản lí',
            'page' => 'Home/Index',
            'totalAdmin' => $totalAdmin,
            'totalUser' => $totalUser,
            'totalProduct' => $totalProduct,
            'totalSuccessOrder' => $totalSuccessOrder,
            'totalDoingOrder'=>$totalDoingOrder,
            'totalProcessOrder' => $totalProcessOrder
        ], 1);
    }
    public function Profile()
    {
        $this->loadView('Shared', 'Layout', [
            'title' => 'Thông tin quản lí',
            'page' => 'Home/Profile'
        ], 1);
    }
}
