<?php
if(isset($_POST['text'])){
	$title = $_POST['title'];
	$text = htmlspecialchars($_POST['text']);
	

	
	$my_post = new my;
	$my_post->addPost($title, $text);
}
if (isset($_FILES["file"]["name"])) {

    $name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    if (!empty($name)) {
        $location = '/';

        if  (move_uploaded_file($tmp_name, $location.$name)){
            echo 'Uploaded';
        }

    } else {
        echo 'please choose a file';
    }
}
?>