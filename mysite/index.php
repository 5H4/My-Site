<?php $my = new my; // Do not remove ! ?>
<html>
	<head>
		<?= $my->addBootstrap(); ?>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
	</head>


<?php
if(!$my->is_single()){
$a = array('from' => 'posts', 'limit' => 1);
$aa = $my->query($a);
while($q = $aa->fetch(PDO::FETCH_ASSOC)){
	
	echo '</BR>TITLE: '.$q['title'];
	
}
} else {
echo $my->post(text);
}
?>

</html>