<?php
include_once('functions.php');

session_start();
$cred = $_POST['data'];
$connect = $XDL->xdline_connect("config.ini");
$un = mysqli_escape_string($connect, $cred['username']);
$pw = mysqli_escape_string($connect, $cred['password']);

$pw = $XDL->encrypt_password($pw);

$res = $XDL::select("username, password, user_id, team_id", "users_table", "username = '$un' and password = '$pw'", "config.ini");
if($res[0] != ""){
	$_SESSION['xdl_part_details'] = $res[0];
	$_SESSION['orgpassed'] = false;
	echo 'SUCCESS';
}else{
	echo 'FAILED';
}
?>