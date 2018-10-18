<?php
	class Fastphp{
		public $_config;
		public function __construct($arr){
			$this->_config = $arr;
			// var_dump($arr);die;
		}
		public function route(){
			$url = $_SERVER['REQUEST_URI'];
			$url = trim($url,"/");
			$arrUrl = explode("?",$url);
			$arrInfo = $arrUrl[1];
			$secondInfo = explode("&",$arrInfo);
			$arrTmp = array();
			foreach ($secondInfo as $key => $value){
				$c = explode("=",$value)[1];
				$arrTmp[] = $c;
			}
			$className = $arrTmp[0];
			$className = ucfirst($className);
			$actionName= $arrTmp[1];
			// var_dump($actionName);die;
			$objc = new $className($className,$actionName);
			$objc -> $actionName();
		}
		public function run(){
			spl_autoload_register(array($this,'loadClass'));
			model::$_config = $this->_config;
			$this -> route();
		}
		public function loadClass($class){
			$freamkwork = APP_PATH."/vendor/".$class.".php";
			$controllers= APP_PATH."application/controllers/".$class.'.php';
			$views      = APP_PATH."application/views/".$class.".php";
			$models     = APP_PATH."application/models/".$class.".php";
			if(file_exists($freamkwork)){
				include $freamkwork;
			}elseif (file_exists($controllers)) {
				include $controllers;
			}elseif(file_exists($views)){
				include $views;
			}elseif(file_exists($models)){
				include $models;
			}
		}
		 public function stripSlashesDeep($value){
	        $value = is_array($value) ? array_map(array($this, ‘stripSlashesDeep’), $value) : stripslashes($value);
	        return $value;
	    }

	    // 检测敏感字符并删除

	    public function removeMagicQuotes(){
	        if (get_magic_quotes_gpc()) {
	            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET ) : ”;
	            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST ) : ”;
	            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : ”;
	            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : ”;
	        }
	    }
	}