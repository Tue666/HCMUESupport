<?php
class Home extends ViewModel
{
	public function Index()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Home',
			'page' => 'Home/Index'
		],1);
	}
    public function abc()
	{
		echo 'Đây là trang abc';
	}
}