<?php
class _file
{
	public $lib = '/lib/';
	public $admin = '/lib/admin/';
	public $mysite = '/mysite/';
	public $newpage = './mysite/_pages/';
	
	public $design = '/lib/design_file/';
	
	function _lib($meta){
		
		include $this->lib.''.$meta.'.php';
		
	}
	function _admin($meta){
		
		include $this->admin.''.$meta.'.php';
		
	}
	
	function _design($meta){
		if($meta == 'default'){
			$meta = 'html_setup';
		}
		
		include $this->design.''.$meta.'.php';
		
	}
	
	function _mysite($meta){
		
		include $this->mysite.''.$meta.'.php';
		
	}
	function create_new_page($meta){
		$default = '<?php $my = new my; // Do not remove ! ?>';
		if(!file_exists($this->newpage.''.$meta.'.php')){
		if(!file_exists($this->newpage)) {
			mkdir($this->newpage, 0777, true);
		}
			$door = $this->newpage.''.$meta.'.php';
			fopen($door, "w");
			fwrite('./mysite/test.php', $default);
			fclose($door);
		} else { return false; }
	}
}
$inc = new _file;

$inc->_lib('config');
$inc->_design('default');




?>