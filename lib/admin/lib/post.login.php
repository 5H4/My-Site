<?php
if(isset($_POST['login_admin'])){
	$username = $_POST['u'];
	$password = $_POST['p'];
	
	$my_login = new my;
	$my_login->login('admin', $username, $password);
}
?>