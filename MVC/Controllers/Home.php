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
}
