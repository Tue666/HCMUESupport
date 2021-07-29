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
    public function Profile()
    {
        $this->loadView('Shared', 'Layout', [
            'title' => 'Profile',
            'page' => 'Home/Profile'
        ], 1);
    }
}
