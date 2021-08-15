<?php
class Order extends ViewModel
{
  public function __construct()
  {
    if (empty($_SESSION['USER_SESSION']) || !$_SESSION['USER_TYPE_SESSION']) {
      header('Location:' . BASE_URL . 'Login/Index');
    }
  }
  public function Index()
  {
    $this->loadView('Shared', 'Layout', [
      'title' => 'Orders',
      'page' => 'Order/Index'
    ], 1);
  }
  public function Print()
  {
    $this->loadView('Order', 'Print', [
      'title' => 'Print'
    ], 1);
  }
}
