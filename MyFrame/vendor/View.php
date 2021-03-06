<?php
	class View{
		public $_config = array();
		private $_className;
		private $_actionName;
		public function __construct($className,$actionName){
			$this->_className = $className;
			$this->_actionName = $actionName;
		}
		public function assign($key,$value){
			$this->_config[$key] = $value;
		}
		public function display($filename=null){
			extract($this->_config);
			$filename = empty($filename)?$this->_actionName:$filename;
			require APP_PATH."application/views/{$this->_className}/{$filename}";
		}
	}
?>