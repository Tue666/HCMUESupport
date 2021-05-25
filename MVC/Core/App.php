<?php
class App{
    protected $controller = 'Home';
    protected $action = 'Index';
    protected $params = [];
    function __construct(){
        $url = $this->getUrl();
        if (file_exists('./MVC/Controllers/')){
            $this->controller = $url[0];
        }
        require_once('./MVC/Controllers/'.$this->controller.'.php');
        unset($url[0]);
        if (isset($url[1])) {
            if (method_exists($this->controller,$url[1])) {
                $this->action = $url[1];
            }
            unset($url[1]);
        }
        $this->controller = new $this->controller;
		$this->parametres = (!empty($url))?array_values($url):[];
        call_user_func_array(array($this->controller,$this->action), $this->parametres);
    }
    private function getUrl(){
        return isset($_GET['url'])?explode('/',trim($_GET['url'],'/')):[$this->controller,$this->action];
    }
}
?>
