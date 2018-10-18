<?php
	class ProductModel extends Model{
		public $_table = "product";
		public function getProductInfo(){
			$data = $this->selectRecord();
		return $data;
		}
	}
?>