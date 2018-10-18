<?php
	class Sql{
		public static $_config;
		public static $res;
		public function __construct(){
			$host = self::$_config['db']['host'];
			$user = self::$_config['db']['user'];
			$pwd = self::$_config['db']['pwd'];
			$name= self::$_config['db']['name'];
			self::$res=@mysql_connect($host,$user,$pwd);
			@mysql_select_db($name);
			@mysql_set_charset('utf8');
		}
		private function handleSql($arr,$type){
			$sql="";
			foreach($arr as $key => $value){
				if(is_numeric($value)){
					$sql.="$key=$value $type ";
				}else{
					$sql.="$key='$value' $type ";
				}
			}
			$sql = trim($sql,"' '|$type");
			return $sql;
		}
		private function handleSSql($arr){
			$sql="";
			foreach($arr as $key => $value){
					$sql.="$value,";
			}
			$sql = trim($sql,"','");
			return $sql;
		}
		public function query($sql){
			$res = mysql_query($sql);
			return $res;

		}
		public function insert($arrValue){
			$opType = ",";
			$strValue = $this->handleSql($arrValue,$opType);
			$Sql = "INSERT INTO {$this->_table} SET {$strValue}";
			$res = $this->query($Sql);
			return $res;
		}
		public function updata($arrValue,$arrWhere){
			$strValue = $this->handleSql($arrValue,",");
			$strWhere = $this->handleSql($arrWhere,"AND");
			$sql = "UPDATE {$this->_table} SET {$strValue} WHERE {$strWhere}";
			$res = $this->query($sql);
			return $res;
		}
		public function delete($arrWhere){
			$strWhere = $this->handleSql($arrWhere,"AND");
			$sql = "DELETE FROM {$this->_table} WHERE {$strWhere}";
			$res = $this->query($sql);
			return $res;
		}
		public function select($arrColumn,$arrWhere){
			$strColumn = $arrColumn=="*"?"*":$this->handleSSql($arrColumn,",");
			$strWhere = $this->handleSql($arrWhere,"AND");
			$sql = "SELECT {$strColumn} FROM {$this->_table} WHERE {$strWhere}";
			// echo $sql;die;
			$res = $this->query($sql);
			return $res;
		}
	}
?>