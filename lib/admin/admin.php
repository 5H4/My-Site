<?php
class admin
{
	public $lib = '/lib/admin/lib/';
	
	function _lib($meta){
		include $this->lib.''.$meta.'.php';
	}
	function _login(){
		return (isset($_SESSION['username'])) ? true : false;
	}
}
$admin = new admin;
if($admin->_login()){
	$admin->_lib('post.posts');
	$admin->_lib('dashboard');
} else {
	$admin->_lib('post.login');
	$admin->_lib('login');
}
?>