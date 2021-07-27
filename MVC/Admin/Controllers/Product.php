<?php 
class Product extends ViewModel{
    public function __construct(){
        if (empty($_SESSION['USER_SESSION']) || !$_SESSION['USER_TYPE_SESSION']){
			header('Location:'.BASE_URL.'Login/Index');
		}
    }
    public function Index(){
        $productCategories = $this->getModel('ProductCategoriesDAL');
        $listCate = json_decode($productCategories->getCategories(),true);
        $this->loadView('Shared','Layout',[
			'title'=>'Products',
			'page'=>'Product/Index',
            'listCate'=>$listCate
		],1);
    }
}
?>