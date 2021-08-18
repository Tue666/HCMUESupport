<?php
class Account extends ViewModel
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
      'title' => 'Tài khoản',
      'page' => 'Account/Index'
    ], 1);
  }
}
