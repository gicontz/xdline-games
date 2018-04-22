<?php
include_once('functions.php');

session_start();
$cred = $_POST['data'];
$un = mysql_escape_string($cred['username']);
$pw = mysql_escape_string($cred['password']);

$pw = $XDL->encrypt_password($pw);

$res = $XDL::select("username, password, user_id, team_id", "users_table", "username = '$un' and password = '$pw'", "config.ini");
if($res[0] != ""){
	$_SESSION['xdl_part_details'] = $res[0];
	echo 'SUCCESS';
}else{
	echo 'FAILED';
}
?>