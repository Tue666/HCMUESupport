<?php
class Home extends ViewModel
{
	protected $productcategories;
	function __construct()
	{
		$this->productcategories = $this->getModel('ProductCategoriesDAL');
	}
	public function Index()
	{
		$listCategories = json_decode($this->productcategories->getCategories(), true);
		$this->loadView('Shared', 'Layout', [
			'title' => 'Home',
			'page' => 'Home/Index',
			'listCategories' => $listCategories
		]);
	}
	public function Success()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Success',
			'page' => 'Shared/Success'
		]);
	}
	public function Failed()
	{
		$this->loadView('Shared', 'Layout', [
			'title' => 'Failed',
			'page' => 'Shared/Fail'
		]);
	}
}
