<?php
class Home extends ViewModel{
	protected $product;
	function __construct(){
		$this->product = $this->getModel('ProductDAL');
	}
    public function Index($page=1){
		$pageSize = 7;
		$totalItem = json_decode($this->product->countTotalProduct(),true);
		$totalPage = ceil($totalItem/$pageSize);
		$maxPage = 10;
		$nextPage = $page+1;
		$prevPage = $page-1;
		$productsByPage = json_decode($this->product->getProductByPage($page,$pageSize),true);
		$this->loadView('Shared','Layout',[
			'screen'=>'Home/Index',
			'product'=>$productsByPage,
			'totalItem'=>$totalItem,
			'totalPage'=>$totalPage,
			'maxPage'=>$maxPage,
			'nextPage'=>$nextPage,
			'prevPage'=>$prevPage,
			'currentPage'=>$page
		]);
	}
}
