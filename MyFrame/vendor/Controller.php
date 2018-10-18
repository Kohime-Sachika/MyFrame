<?php
	header("content-type:text/html;charset=utf-8");
	class Controller{
		public $_views;
		public function __construct($className,$actionName){
			$this->_views = new View($className,$actionName);
		}
	}
?>