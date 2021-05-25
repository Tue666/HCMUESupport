<?php
class ViewModel{
    protected function getModel($model) {
		require_once('./MVC/Models/'.$model.'.php');
		return new $model;
	}
	protected function loadView($controller,$action,$model=[]){
		if (file_exists('./MVC/Views/'.$controller.'/'.$action.'.php')) {
			require_once('./MVC/Views/'.$controller.'/'.$action.'.php');
		}
		else {
			require_once('./MVC/Views/'.'Shared/404.php');
		}
	}
}
?>