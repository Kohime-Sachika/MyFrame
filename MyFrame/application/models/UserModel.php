<?php
	class UserModel extends Model{
		public $_table = "user";
		public function getUserinfo(){
			$data = $this->selectRecord();
		return $data;
		}
	}
?>