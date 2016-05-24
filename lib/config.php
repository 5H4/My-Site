<?php
global $con;
class _db
{
	protected $db_localhost = 'localhost';
	protected $db_password = '';
	protected $db_username = 'root';
	protected $db_database = 'frm';
	protected $installed = 1;
	
	function db_connect(){
		if($this->installed == 1){
			$ssl = 'mysql:host='.$this->db_localhost.';dbname='.$this->db_database.';';
			return new PDO($ssl, $this->db_username, $this->db_password);
			
		} else {
			$inc = new _file;
			
				$inc->_lib('html');
				$inc->_lib('setup');
			
		}
	}
	function fresh(){
		$r = $this->installed;
		if($r == 1){
			$inc = new _file;
			if(isset($_GET['query']) == 'admin'){
				$inc->_lib('lib.mysite');
				$inc->_admin('admin');
			} else {
				$inc->_lib('lib.mysite');
				$inc->_mysite('index');
			}
		}
	}

}
$db = new _db;
$db->db_connect();
$db->fresh();
?>