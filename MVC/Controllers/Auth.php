<?php
class Auth extends ViewModel
{
	public function Index()
	{
		$this->loadView('Auth', 'Index', [
			'title' => 'Cập nhật thông tin',
		]);
	}
	public function Update()
	{
		if (isset($_POST['update-btn'])) {
			$accounts = $this->getModel('AccountsDAL');
			$name = $_POST['update-name'];
			$email = $_POST['update-email'];
			$address = $_POST['update-address'];
			$phone = $_POST['update-phone'];

			if (json_decode($accounts->updateAccount($_SESSION['USER_ID_SESSION'],$name,$email,$phone,$address,0,1))) {
				$_SESSION['USER_STATUS_SESSION'] = 1;
				header('Location:' . BASE_URL);
			}
			else{
				$this->loadView('Auth', 'Index', [
					'title' => 'Cập nhật thông tin',
					'message' => 'Lỗi. Liên hệ BCH để hỗ trợ',
					'type' => 'error'
				]);
			}
		}
	}
}
