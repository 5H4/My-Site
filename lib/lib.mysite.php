<?php
DEFINE('title', 'title');
DEFINE('autor_id', 'autor_id');
DEFINE('id', 'id');
DEFINE('text', 'text');
DEFINE('image', 'image');

class my extends _db{
	
	function title(){
		$sql = 'SELECT title FROM options';
		$q = parent::db_connect()->query($sql);
		$r = $q->fetch(PDO::FETCH_ASSOC);
		
		return $r['title'];
	}
	function url(){
		$sql = 'SELECT url FROM options';
		$q = parent::db_connect()->query($sql);
		$r = $q->fetch(PDO::FETCH_ASSOC);
		
		return $r['url'];
	}
	//While posts
	function query($arr){
		if(isset($arr['from']) && !empty($arr['from'])) {
			$add_0 = $arr['from'];
		}
		if(isset($arr['where']) && !empty($arr['where'])) {
			$add_1 = 'WHERE '.$arr['where'].'';
		} else { $add_1 = '';}
		if(isset($arr['orderby']) && $arr['orderby']) {
			$add_2 = 'ORDER BY '.$arr['orderby'].'';
		} else { $add_2 = '';}
		if(isset($arr['limit']) && $arr['limit']) {
			$add_3 = 'LIMIT '.$arr['limit'].'';
		} else { $add_3 = '';}
		$query = 'SELECT * FROM '.$add_0.' '.$add_1.' '.$add_2.' '.$add_3.'';
		$q = parent::db_connect()->query($query);
		return $q;
	}
	//Single post
	function post($data){
		$postid = $_GET['postid'];
		$query = 'SELECT * FROM posts WHERE id="'.$postid.'"';
		$q = parent::db_connect()->query($query)->fetch(PDO::FETCH_ASSOC);
		if($data == text){
			$e = htmlspecialchars_decode(stripslashes($q[$data]));
			return $e;
		}
		return $q[$data];
	}
	function is_single(){
		return (isset($_GET['postid'])) ? true : false;
	}

	function addBootstrap(){
		return '
		<link rel="stylesheet" type="text/css" href="/lib/design_file/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/lib/design_file/css/bootstrap-theme.min.css" />
		<script src="/lib/design_file/js/bootstrap.min.js"></script>
		<script src="/lib/design_file/js/jquery-2.2.3.min.js"></script>';
	}
	function login($access, $username, $password){
	$sql = 'SELECT username,password FROM '.$access.' WHERE username = :username';
	$query = parent::db_connect()->prepare($sql);
	$query->bindParam(':username', $username);
	$query->execute();
	$r = $query->fetch(PDO::FETCH_ASSOC);
	
		if(count($r) > 0 && $password == $r['password']){
			$_SESSION['username'] = $r['username'];
		} else {
			echo '<script>alert("Username or password incorrect !");</script>';
		}
	
	}
	function addPost($title, $text){
		$sql_q = parent::db_connect()->prepare("INSERT INTO posts(title, text)
			VALUES(:title, :text)");
		$sql_q->execute(array(
			"title" => $title,
			"text" => $text
		));
	}
}

?>