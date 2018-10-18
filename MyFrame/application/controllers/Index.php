<?php
	class Index extends Controller{
		public function first(){
			// $objuser = new UserModel();
			// $data = $objuser->getUserinfo();
			// var_dump($data);
			// echo "ok";
			// die;
			// $key = "name";
			// $value = "test_name";
			// $this->_views->assign($key,$value);
			$arr = array(
				"name" => "asd",
				"age"  => 30,
			);
			$this->_views->assign("info",$arr);
			// die;
			$filename = "info.php";
			$this->_views->display($filename);
		}
		public function main(){
			$objuser = new ProductModel();
			$data = $objuser->getProductInfo();
			$objuser = new NewsModel();
			$column = array("n_name","n_addtime");
			$news_data = $objuser->getNewsInfo($column);
			$this->_views->assign("news_data",$news_data);
			$this->_views->assign("data",$data);
			$this->_views->display("main.php");
		}
	}
?>