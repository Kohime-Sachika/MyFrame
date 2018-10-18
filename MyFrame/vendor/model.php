<?php
	class Model extends Sql{
		public function insertRecord($arr){
			$res = $this->insert($arr);
			return $res;
		}
		public function updataRecord($arrValue,$arrWhere=array("1"=>"1")){
			$res = $this->updata($arrValue,$arrWhere);
			return $res;
		}
		public function deleteRecord($arrWhere=array("1"=>"1")){
			$res = $this->delete($arrWhere);
			return $res;
		}
		public function selectRecord($arrColumn="*",$arrWhere=array("1"=>"1")){
			$res = $this->select($arrColumn,$arrWhere);
			$res_arr = array();
			while($row = mysql_fetch_assoc($res)){
				array_push($res_arr,$row);
			}
			return $res_arr;
		}
	}
?>