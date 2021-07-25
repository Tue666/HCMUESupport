<?php
class Login extends ViewModel
{
	protected $accounts;
	function __construct()
	{
		$this->accounts = $this->getModel('AccountsDAL');
	}
	public function Index()
	{
		$this->loadView('Login', 'Index', [
			'title' => 'Login',
		]);
	}
	public function Register()
	{
		if (isset($_POST['register-btn'])) {
			$userName = strtolower($_POST['regis-user-name']);
			$passWord = $_POST['regis-password'];
			$confirmPassword = $_POST['regis-confirm-password'];
			if ($passWord != $confirmPassword) {
				$this->loadView('Login', 'Index', [
					'title' => 'Login',
					'message' => 'Mật khẩu không giống nhau :D',
					'type' => 'error'
				]);
			} else {
				if (json_decode($this->accounts->checkExist($userName))) {
					$this->loadView('Login', 'Index', [
						'title' => 'Login',
						'message' => 'Tên tài khoản đã được sử dụng :D',
						'type' => 'error'
					]);
				} else {
					$passWord = password_hash($passWord, PASSWORD_DEFAULT);
					if (json_decode($this->accounts->insertAccount($userName, $passWord))) {
						$this->loadView('Login', 'Index', [
							'title' => 'Login',
							'message' => 'Đăng ký thành công :D',
							'type' => 'success'
						]);
					} else {
						$this->loadView('Login', 'Index', [
							'title' => 'Login',
							'message' => 'Đăng ký thất bại :D',
							'type' => 'error'
						]);
					}
				}
			}
		}
	}
	public function Login()
	{
		if (isset($_POST['login-btn'])) {
			$userName = strtolower($_POST['login-user-name']);
			$passWord = $_POST['login-password'];
			$account = json_decode($this->accounts->getAccountByName($userName), true);
			if (password_verify($passWord, $account['PassWord'])) {
				$_SESSION['USER_ID_SESSION'] = $account['ID'];
				$_SESSION['USER_SESSION'] = $account['UserName'];
				if ($account['Type'] != 0) {
					// For Admin Manage Page
				} else {
					// For User Page
					if ($account['Status'] != 0) {
						header('Location:' . BASE_URL);
					} else {
						header('Location:'.BASE_URL.'Auth/Index');
					}
				}
			} else {
				$this->loadView('Login', 'Index', [
					'title' => 'Login',
					'message' => 'Tên đăng nhập hoặc mật khẩu sai :D',
					'type' => 'error'
				]);
			}
		}
	}
	public function Logout()
	{
		session_destroy();
		header('Location:'.BASE_URL.'Login/Index');
	}
}