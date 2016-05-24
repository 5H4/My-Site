<?php
function replace_string_in_file($filename, $string_to_replace, $replace_with){
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
}

if(isset($_POST['changeAcrd'])){
$host = $_POST['host'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$db_name = $_POST['db_name'];
replace_string_in_file('lib/config.php', 'none1', $host);
replace_string_in_file('lib/config.php', 'none3', $user);
replace_string_in_file('lib/config.php', 'none2', $pass);
replace_string_in_file('lib/config.php', 'none4', $db_name);
replace_string_in_file('lib/config.php', '0002', 1);
}
?>