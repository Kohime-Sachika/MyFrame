<?php
	class NewsModel extends Model{
		public $_table = "news";
		public function getNewsInfo($arrColumn){
			$data = $this->selectRecord($arrColumn);
		return $data;
		}
	}
?>