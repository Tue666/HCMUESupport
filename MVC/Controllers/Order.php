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

        $this->loadView('Shared', 'Layout', [
            'title' => 'Order',
            'page' => 'Order/Index',
            'account' => $account
        ]);
    }
}
